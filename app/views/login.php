<form method="POST" action="/login">
    <div class="form-group">
        <label for="exampleInputUsername">Email address</label>
        <input name="username" type="text" class="form-control" id="exampleInputUsername" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
    </div>
    <!-- <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div> -->
    <div class="checkbox">
        <label>
            <input type="checkbox"> remember me
        </label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
