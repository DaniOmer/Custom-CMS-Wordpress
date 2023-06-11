<h1>S'inscrire</h1>

<form action="<?= \Core\Router::url("security.register","POST") ?>" method="post">
    <div>
        <input placeholder="firstname" type="text" name="firstname">
        <p><?=\Core\Session::getError("lastname")?></p>
    </div>

    <div>
        <input placeholder="lastname" type="text" name="lastname">
        <p><?=\Core\Session::getError("lastname")?></p>
    </div>

    <div>
        <input placeholder="email" type="email" name="email">
        <p><?=\Core\Session::getError("email")?></p>
    </div>

    <div>
        <input placeholder="password" type="password" name="password">
        <p><?=\Core\Session::getError("password")?></p>
    </div>

    <div>
        <input placeholder="password_confirm" type="password" name="password_confirm">
        <p><?=\Core\Session::getError("password_confirm")?></p>
    </div>

    <button type="submit">Submit</button>

</form>