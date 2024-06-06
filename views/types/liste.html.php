<?php
$errors=[];
if (Session::get("errors")) {
    $errors=Session::get("errors");
}
?>
<div class="w-screen flex flex-col">
    <div class="w-full mb-5">
        <div class="max-w-full mx-auto bg-white shadow-md rounded-md mt-5">
            <div class="bg-gray-100 text-gray-800 font-bold p-2">Liste des Types d'Articles</div>
            <div class="p-4">
                <form action="<?= WEBROOT ?>" method="post">
                    <div class="mb-4">
                        <label for="validationServerNomType" class="block text-sm font-medium text-gray-700">Nom
                            Type:</label>
                        <input name="nomType" type="text"
                            class="block mt-1 w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border <?=add_class_invalid("nomType","border-red-600","border-gray-300")?>  rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                            id="validationServerNomType" aria-describedby="validationServerNomTypeFeedback">
                        <div id="validationServerNomTypeFeedback" class="text-sm text-red-600 mt-1 <?=add_class_invalid("nomType")?>">
                            <?= $errors["nomType"]??""?>
                        </div>
                    </div>
                    <input type="text" class="hidden" name="action" value="save-type">
                    <input type="text" class="hidden" name="controller" value="type">
                    <div class="flex justify-end mb-4">
                        <button type="submit"
                            class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Enregistrer
                        </button>
                    </div>
                </form>
                <div class="overflow-x-auto">
                    <table class="table-fixed w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4">ID</th>
                                <th class="py-2 px-4">Nom Type</th>
                                <th class="py-2 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($types as $type):
                                ?>
                                <tr class="border-b">
                                    <td class="py-2 px-4">
                                        <center><?= $type["id"] ?></center>
                                    </td>
                                    <td class="py-2 px-4">
                                        <center><?= $type["nomType"] ?></center>
                                    </td>
                                    <td class="py-2 px-4">
                                        <form action="<?= WEBROOT ?>" method="post" style="display:inline;">
                                            <input type="text" class="hidden" name="action" value="modifier-type">
                                            <button type="submit" name="id" value="<?= $type["id"] ?>"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </button>
                                        </form>
                                        <form action="<?= WEBROOT ?>" method="post" style="display:inline;">
                                            <input type="text" class="hidden" name="action" value="supprimer-type">
                                            <button type="submit" name="id" value="<?= $type["id"] ?>"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Session::remove("errors");?>