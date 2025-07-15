<?php 
    $page_title = "contact us page";
    include 'includes/header.php'
?>
    <div style="height:100vh" class="d-flex flex-column justify-content-center">
        <h1 class="text-center">Contact Us</h1>
        <div class="d-flex justify-content-center form_container">
            <form class="form_control d-flex justify-content-center align-items-center flex-column border p-4 rounded shadow mt-4" action="contact_process.php" , method="post" style="width:500px">
                <div class="mb-3 w-100">
                    <label class="form-label">Name </label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Username">
                </div>
                <div class="mb-3 w-100">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3 w-100">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php include "includes/footer.php" ?>