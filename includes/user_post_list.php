<div class="user_post_table_container">
    <h3 style="text-align: center;margin: 40px 0;">Post List</h3>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Post</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<script>

    const url = "./functions/getpost.php";
    let slNo = 1;
    user_emai = <?php echo json_encode(['email'=>$_SESSION["email"]]) ?>
    // fetch and listed the list to the table
    // console.log(user_emai.email);
    fetch(url)
        .then(res => res.json())
        .then(data => {
            console.log(data);
            data.map(elm =>{
                if(elm.user_email === user_emai.email){

                    const html = `            
                    <tr data-id=${elm.post_id}>
                        <td>${slNo++}</td>
                        <td style="width: 70%; height: 200px; overflow: scroll;">${elm.content}</td>
                        <td>${elm.created_at}</td>
                        <td> <form class="delete_form" method="POST" action="./functions/deletepost.php">
                            <input name="post_value_id" value=${elm.post_id} hidden/>
                            <input type="submit" value="Delete" name="delete_post" style="cursor: pointer;" />
                        </form> 
                        <a href="update_post.php?id=${elm.post_id}">Edit</a></td>
                    </tr> 
                 `
                    document.querySelector(".user_post_table_container table tbody").insertAdjacentHTML("beforeend", html);
                }

                    
                
            })

            if(data.length < 0){
                const html = `<h4 style="text-align: center; margin-top: 20px;">There is not posts</h4>`

                document.querySelector(".user_post_table_container table tbody").innerHTML = html;
            }
        })
        .catch(err=>{
            console.log(err);
        })

    // delete post from table
    
    const allform = document.querySelectorAll(".delete_form")

    allform.forEach(form => {

        
        form.addEventListener("submit", (e)=>{
            const postId = form.querySelector(".post_value_id").value;

            fetch(form.action, {method: "POST", body: new FormData(form)})
                .then(res => res.json())
                .then(data => {
                    if(data.success){
                        document.querySelector(`tr[data-id=${postId}]`).remove;
                    }else{
                        console.log("Data delete failed");
                    }
                })
                .catch(err => {
                    console.log(err);
                })

        })
    })


</script>