<h1>Create account</h1>
<form method="post" action="/register">
    <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input type="text" class="form-control" name="login" >
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" name=confirmPassword">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>