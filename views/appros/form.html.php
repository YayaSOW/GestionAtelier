<div class="flex-1 flex flex-col">
    <div class="container mb-5">
        <div class="w-3/4 mx-auto bg-white shadow-md rounded-md p-4">
            <div class="bg-gray-100 text-gray-800 font-bold p-2">Nouvelle Approvisionnement</div>
            <form action="<?= WEBROOT ?>" method="post">
                <div class="mb-4">
                    <label for="Categorie" class="block text-sm font-bold mb-2">Fournisseur</label>
                    <select name="fournisseurId"
                        class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                        id="Categorie" aria-label=".form-select-lg example">
                        <option selected>...</option>
                        <?php
                        use App\Core\Session;

                        foreach ($fournisseurs as $fournisseur):
                            ?>
                            <option <?php if (Session::get("panier") != false && Session::get("panier")->fournisseur == $fournisseur["id"])
                                echo "selected" ?>
                                    value="<?= $fournisseur["id"] ?>"><?= $fournisseur["nomFour"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="flex space-x-4 mb-4">
                    <div class="w-1/2">
                        <label for="Categorie" class="block text-sm font-bold mb-2">Articles</label>
                        <select name="articleId"
                            class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                            id="Categorie" aria-label=".form-select-lg example">
                            <option selected>...</option>
                            <?php
                            foreach ($response["data"] as $article):
                                ?>
                                <option value="<?= $article["id_article"] ?>"><?= $article["libelle"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="QteAppro" class="block text-sm font-bold mb-2">Qte Appro</label>
                        <input type="text" name="qteAppro"
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            aria-label="Last name">
                    </div>
                    <div class="w-1/5">
                        <button type="submit" name="btnSave"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4  mt-7 rounded">Add</button>
                    </div>
                </div>

                <div class="flex justify-end">
                    <input type="text" class="hidden" name="action" value="add-article">
                    <input type="text" class="hidden" name="controller" value="appro">
                </div>
            </form>
            <div class="overflow-x-auto  mb-4">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Article</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Qte</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prix</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Montant</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        if (Session::get("panier") != false):
                            foreach (Session::get("panier")->articles as $article):
                                ?>
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $article["libelle"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $article["qteAppro"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $article["prixAppro"] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $article["montantArticle"] ?></td>
                                </tr>
                            <?php
                            endforeach;
                        endif;
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="">
                <div class="text-right">
                    Total: <span class="text-red-500 text-lg"><?php if (Session::get("panier") != false) echo Session::get("panier")->total; else echo "0" ?>CFA</span>
                </div>
            </div>
            <br>
            <div class="flex justify-center">
                <a href="<?= WEBROOT ?>?controller=appro&action=add-appro" role="button"
                    class="w-1/2 text-center inline-block px-6 py-2 text-white bg-blue-500 hover:bg-blue-700 font-semibold rounded shadow">
                    Enregistrer
                </a>
            </div>
        </div>
    </div>
</div>