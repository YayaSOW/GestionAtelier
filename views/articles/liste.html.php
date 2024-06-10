<div class="flex-1 flex flex-col">
    <nav class="bg-white shadow-md flex items-center justify-center text-xl font-bold px-4 py-2">
        <h1>Liste Article</h1>
    </nav>
    <main class="p-4 flex-1 overflow-y-auto">
        <h3 class="text-xl font-bold my-3">Les Articles</h3>
        <div class="flex justify-end mb-3">
            <a id="" class="bg-gray-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                href="<?= WEBROOT ?>/?controller=article&action=nouvelle-article" role="button">Nouveau</a>
        </div>
        <div class="bg-white shadow-md rounded-md">
            <table class="w-full table-fixed border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 w-1/3">Libelle</th>
                        <th class="py-2 px-4 w-1/5">Qte Stock</th>
                        <th class="py-2 px-4 w-1/5">Prix</th>
                        <th class="py-2 px-4 w-1/3">Categorie</th>
                        <th class="py-2 px-4 w-1/3">Type</th>
                        <th class="py-2 px-4 w-1/3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($articles as $article):
                        ?>
                        <tr>
                            <td class="py-2 px-4">
                                <center><?php echo $article["libelle"] ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <center><?= $article["qteStock"] ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <center><?= $article["prixAppro"] ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <center><?= $article["nomCategorie"] ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <center><?= $article["nomType"] ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <form action="<?= WEBROOT ?>" method="post" style="display:inline;">
                                    <button name="id" value="<?= $article["id_article"] ?>"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                        <a
                                            href="<?= WEBROOT ?>?controller=article&action=modifier-article&id=<?= $article["id_article"] ?>">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    </button>
                                    <input type="hidden" name="action" value="supprimer-article">
                                    <input type="hidden" name="controller" value="article">
                                    <button name="id" value="<?= $article["id_article"] ?>"
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
    </main>
</div>