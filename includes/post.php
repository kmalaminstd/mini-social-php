




<script>

    const month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

    const postUrl = "./functions/getpost.php"
    
    
        document.addEventListener("DOMContentLoaded", (e)=>{
            fetch(postUrl)
            .then(res => res.json())
            .then(data => {
                // console.log(data);
                data.data.forEach(elm => {
                    const html = createPostElement(elm)
                        
                    document.querySelector(".posts").appendChild(html)

                    
                    
                    const post_id = elm.post_id
                    const commentsDiv = document.querySelectorAll(`.comments[data-post-id="${post_id}"]`)
                    showComment(commentsDiv, post_id)
                })
                const commentInputDiv = document.querySelectorAll(`.comment-input`);
                commentDataSend(commentInputDiv)


            })
            .catch(err=>{
                console.log(err.message);
                console.log(err.code);
            })

            // const commentDiv = document.querySelectorAll('.comment')
            // console.log(commentDiv);

            
            
        })

        

        
    function createPostElement(elm){

        const date = new Date(elm.post_created_at)
        
        const postElement = document.createElement("div")
        postElement.classList.add("post")

        postElement.innerHTML = `
                                <div class="post-header">
                                    <div class="author_image">
                                        
                                        <img src="${elm.profile_image || "./assets/images/dummy-author.png"}" alt="Author Image">
                                    
                                    </div>
                                    <div>
                                        <div class="post-author">${elm.author_name}</div>
                                        <div class="post-time">${date.getDate() + ' ' + month[date.getMonth() + 1] + ' ' + date.getFullYear()}</div>
                                    </div>

                                </div>
                                <div class="post-content">
                                    <p>${elm.content}</p>
                                </div>

                                <div class="post-footer">
                                    <div class="comments comment_list" data-post-id="${elm.post_id}">
                                    </div>
                                    
                                    <div class="comment-input">
                                        <form id="comment_input_form" method="POST">
                                            <input type="text" name="comment_content" placeholder="Add a comment...">
                                            <input type="text" name="post_id" value="${elm.post_id}" hidden/>
                                            <button style="background-color: lightgreen;" type="button" id="comment_sub" name="commet_sub"> Comment </button>
                                        </form>
                                    </div>
                                </div>
        `
        
        

        return postElement
    }

    function commentDataSend(commentDiv){
        // console.log(commentDiv);
        commentDiv.forEach( cmtDiv => {
            const commentInputForm = cmtDiv.querySelector("#comment_input_form")
            const commentInputBtn = cmtDiv.querySelector("#comment_sub")
            // console.log(cmtDiv);
            commentInputForm && commentInputBtn && commentInputBtn.addEventListener("click",(e)=> {
                    e.preventDefault()

                    // commentInputBtn.disabled = true;

                    const formData = new FormData(commentInputForm);
                    // console.log(formData.getAll("comment_content"));

                    fetch('./functions/createComment.php', {
                        method: "POST",
                        body: formData
                    }).then(res => res.json())
                        .then(data => {
    

                            commentInputForm.reset();
                        })
                        .catch(err=> {
                            console.log(err);
                            // Re-enable the button if needed
                        // commentInputBtn.disabled = false;
                        })
                    
            })
        })

    }


    function showComment(commentDiv , postId){
        fetch("./functions/getComment.php")
            .then(res => res.json())
            .then(data => {
                if(data.success){
                    const filteredComment = data.data.filter(elm => elm.post_id === postId)
                    // console.log(filteredComment);
                    filteredComment.forEach(elm =>{
                        if(elm.post_id === postId){
                            commentDiv.forEach(div => {
                                const html = `
                                        <div class="comment">
                                            <img src="${elm.profile_image ? elm.profile_image : "./assets/images/dummy-author.png"}" alt="Commenter Image">
                                            <div class="comment-text">${elm.comment_text}</div>
                                        </div>
                                `
                                div.insertAdjacentHTML("beforeend", html)
                            })
                        }
                    })
                }
            })
            .catch(err => {
                console.log(err);
            })
    }


</script>