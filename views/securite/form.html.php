<?php
use App\Core\Session;
$errors = [];
if (Session::get("errors")) {
    $errors = Session::get("errors");
}
?>
<div class="w-96 p-6 shadow-lg bg-white rounded-lg">
    <div class="text-center mb-4">
        <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900"><i class="fa-solid fa-user"></i> Login
        </h2>
    </div>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" <?= add_class_invalid("erreur_connection") ?>>
        <?= $errors["erreur_connection"] ?? "" ?>
    </div>

    <div class="mt-10">
        <form action="<?= WEBROOT ?>" method="post" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="login" type="text" autocomplete="text"
                        class="block w-full rounded-md border <?= add_class_invalid("login", "border-red-600", "border-gray-300") ?>  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <div id="validationServerNomTypeFeedback"
                        class="text-sm text-red-600 mt-1 <?= add_class_invalid("login") ?>">
                        <?= $errors["login"] ?? "" ?>
                    </div>
                </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password"
                        class="block w-full rounded-md border <?= add_class_invalid("password", "border-red-600", "border-gray-300") ?>  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <div id="validationServerNomTypeFeedback"
                        class="text-sm text-red-600 mt-1 <?= add_class_invalid("password") ?>">
                        <?= $errors["password"] ?? "" ?>
                    </div>
                </div>
            </div>
            <div>
                <input type="text" class="hidden" name="controller" value="securite">
                <input type="text" class="hidden" name="action" value="connexion">
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Connexion</button>
            </div>
        </form>
    </div>
</div>
<?php Session::remove("errors"); ?>