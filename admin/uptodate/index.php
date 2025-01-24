<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is the index</h1>
</body>
<script>
    const eventS = new EventSource('sse.php') 
    eventS.onmessage =function(event){
        const data =JSON.parse(event.data)
        console.log(data +' '+'Data is there')
        console.log('All is ther')
    }
    eventS.onerror = function(){
        console.log('erreur de connexion au serveur')
    }
</script>
</html>