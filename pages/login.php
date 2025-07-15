<?php 
    $page_title = "Admin login ";
    include '../includes/header.php' 
?>

    <div style="height:100vh" class="d-flex flex-column justify-content-center">
        <h1 class="text-center">Admin Login</h1>
        <div class="d-flex justify-content-center">
            <form class="custom_form border p-4 rounded shadow mt-4" action="../Process/login_process.php" , method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>


<?php include '../includes/footer.php' ?>