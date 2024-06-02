<div class="container mb-5">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-md p-4">
        <div class="bg-gray-100 text-gray-800 font-bold p-2">Nouvelle Article</div>
        <form>
            <div class="mb-4">
                <label for="Libelle" class="block text-sm font-bold mb-2">Libelle</label>
                <input name="libelle" type="text"
                    class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="QteStock" class="block text-sm font-bold mb-2">Qte Stock</label>
                <input name="qteStock" type="number"
                    class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                    id="QteStock" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="Prix" class="block text-sm font-bold mb-2">Prix</label>
                <input name="prixAppro" type="number"
                    class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                    id="Prix" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="Type" class="block text-sm font-bold mb-2">Type</label>
                <select name="typeId"
                    class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                    id="Type" aria-label=".form-select-lg example">
                    <option selected>...</option>
                    <option value="">type1</option>
                    <option value="">type2</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="Categorie" class="block text-sm font-bold mb-2">Categorie</label>
                <select name="categorieId"
                    class="block w-full p-2 pl-10 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                    id="Categorie" aria-label=".form-select-lg example">
                    <option selected>...</option>
                    <option value="">categorie1</option>
                    <option value="">categorie2</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" name="btnSave"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>
</div>