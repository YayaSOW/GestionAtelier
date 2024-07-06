<div class="flex-1 flex flex-col">
    <nav class="bg-white shadow-md flex items-center justify-center text-xl font-bold px-4 py-2">
        <h1>Liste Approvisionnement</h1>
    </nav>
    <main class="p-4 flex-1 overflow-y-auto">
        <h3 class="text-xl font-bold my-3">Les Appro</h3>
        <div class="flex justify-end mb-3">
            <a id="" class="bg-gray-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                href="<?= WEBROOT ?>/?controller=appro&action=nouvelle-appro" role="button">Nouveau</a>
        </div>
        <div class="flex justify-between items-center mb-3">
            <input type="text" id="searchInput" class="border border-gray-300 rounded-md py-2 px-4"
                placeholder="Rechercher par fournisseur...">
            <a id="" class="bg-gray-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                href="<?= WEBROOT ?>/?controller=appro&action=nouvelle-appro" role="button">Nouveau</a>
        </div>

        <div class="bg-white shadow-md rounded-md">
            <table class="w-full table-fixed border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 w-1/3">Date</th>
                        <th class="py-2 px-4 w-1/5">Montant</th>
                        <th class="py-2 px-4 w-1/5">Fournisseur</th>
                        <th class="py-2 px-4 w-1/5">Tel</th>
                        <th class="py-2 px-4 w-1/3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($appros as $appro):
                        $date = new \DateTime($appro["date"]);
                        ?>
                        <tr>
                            <td class="py-2 px-4">
                                <center><?= $date->format("d-m-Y") ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <center><?= $appro["montant"] ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <center><?= $appro["nomFour"] ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <center><?= $appro["telFour"] ?></center>
                            </td>
                            <td class="py-2 px-4">
                                <a href="<?= WEBROOT ?>?controller=appro&action=add-appro" role="button"
                                    class="w-1/2 text-center inline-block px-6 py-2 text-white bg-blue-500 hover:bg-blue-700 font-semibold rounded shadow">
                                    Voir detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>
</div>