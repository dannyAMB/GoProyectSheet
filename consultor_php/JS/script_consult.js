
getData()

document.getElementById("campo").addEventListener("keyup", getData);

function getData(){
 let input = document.getElementById("campo").value
 console.log(input)

 let content = document.getElementById("content_table_body")

 let url = "./load.php"
 let formaData = new FormData()
 formaData.append('campo', input)

 fetch(url, {
       method:"POST",
       body: formaData
 }).then(response=>response.json())
 .then(data=>{

    content.innerHTML = data
 }).catch(err=>console.log(err))

}