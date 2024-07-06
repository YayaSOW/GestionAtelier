document.addEventListener("DOMContentLoaded", async(event) => {
    const reponse = await fetch("http://localhost:8000/?controller=api-type&action=api-liste-type");
    const types = await reponse.json();
    console.log(types);
});
