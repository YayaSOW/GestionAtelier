v
<div class="container mb-5">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-md mt-5">
        <div class="bg-gray-100 text-gray-800 font-bold p-2">Liste des Types d'Articles</div>
        <div class="p-4">
            <form>
                <div class="mb-4">
                    <label for="NomType" class="block text-sm font-bold mb-2">Nom Type</label>
                    <input name="nomType" type="text"
                        class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                        id="NomType" aria-describedby="emailHelp" required>
                </div>
                <div class="flex justify-end mb-4">
                    <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Enregister
                    </button>
                </div>
            </form>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4">ID</th>
                            <th class="py-2 px-4">Nom Categorie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-2 px-4">
                                <center>Type1</center>
                            </td>
                            <td class="py-2 px-4">
                                <center>Type2</center>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>