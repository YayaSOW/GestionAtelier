<div class="w-screen flex flex-col">
    <div class="w-full mb-5">
        <div class="w-full mx-auto bg-white shadow-md rounded-md mt-5">
            <div class="bg-gray-100 text-gray-800 font-bold p-2">Liste des Categories d'Articles</div>
            <div class="p-4">
                <form action="<?= WEBROOT ?>" method="post">
                    <div class="mb-4">
                        <label for="NomCategorie" class="block text-sm font-bold mb-2">Nom Categorie</label>
                        <input name="nomCategorie" type="text"
                            class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                            id="nomCategorie" aria-describedby="emailHelp" required>
                    </div>
                    <div class="flex justify-end mb-4">
                        <input type="text" class="hidden" name="action" value="save-categorie">
                        <input type="text" class="hidden" name="controller" value="categorie">
                        <button type="submit"
                            class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Enregister
                        </button>
                    </div>
                </form>
                <div class="overflow-x-auto">
                    <table class="table-fixed w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4">ID</th>
                                <th class="py-2 px-4">Nom Categorie</th>
                                <th class="py-2 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($categories as $categorie):
                                ?>
                                <tr class="border-b">
                                    <td class="py-2 px-4">
                                        <center><?= $categorie["id"] ?></center>
                                    </td>
                                    <td class="py-2 px-4">
                                        <center><?= $categorie["nomCategorie"] ?></center>
                                    </td>
                                    <td class="py-2 px-4">
                                        <form action="<?= WEBROOT ?>" method="post" style="display:inline;">
                                            <input type="text" class="hidden" name="action" value="modifier-categorie">
                                            <button type="submit" name="id" value="<?= $categorie["id"]?>"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </button>
                                        </form>
                                        <form action="<?= WEBROOT ?>" method="post" style="display:inline;">
                                            <input type="text" class="hidden" name="action" value="supprimer-categorie">
                                            <button type="submit" name="id" value="<?= $categorie["id"]?>"
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