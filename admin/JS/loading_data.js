export async function TableLoading(table){
switch(table){
    case 'Dashboard' :
        $.ajax({
            url:'db/dashboard.php',
            type:'GET',
            dataType:'json',
            success:function(data){
                data.forEach(row =>{
                    const date = new Date(row["date_d'enregistrement"])
                    const jour = date.getDay();
                    const month =date.getMonth();
                    const monthT = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"]
            
                    const annés =date.getFullYear();
                    let id = row.id;
            
                    let tableau2 = `
                         <tr class='tr' meta-data='${row.id}'>
                                  <td class='text-center toVert'><button class='border-0 btn2  text-white'>${row.id}<input type='hidden' class='checkBungalow' name='check' value='${row.bungalow}'></button></td>
                                  <td class='text-center'>${jour} ${monthT[month]} ${annés}</td>
                                  <td>${row.nom}</td>
                                  <td>${row.prenom}</td>
                                  <td><textarea class='col-12' disabled>${row.mail}</textarea></td>
                                  <td class='text-center'>${row.nombre_de_séjour}nuits</td>
                                  <td class='text-center'>${row.prix_totale}</td>
                                  <input class='ddD' type='hidden' value='$ddD'>
                            </tr>`;
            
                            $('.tableR').append(tableau2)
                            $('.checkBungalow').each(function(index, element){
                                if($(element).val() == "" || $(element).val() == "null"){
                                    let input1 = $(element).closest('td')
                                    input1.css('background','#f23f3a')
                                }else{
                                    let input = $(element).closest('td')
                                    input.css('background','#00b487')
                                }
                            })
            
                })
            }
            })
        break
    case 'WaitList' :
        $.ajax({
            url:'db/waitList.php',
            type:'GET',
            dataType:'json',
            success:function(data){
                data.forEach(row =>{
                    const date = new Date(row["date_d'enregistrement"])
                    const jour = date.getDay();
                    const month =date.getMonth();
                    const monthT = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"]
            
                    const annés =date.getFullYear();
                    let id = row.id;
            
                    let tableau3 = `
                         <tr class='tr' meta-data='${row.id}'>
                                  <td class='text-center toVert'><button class='border-0 btn1  text-white'>${row.id}<input type='hidden' class='checkHalf' name='check' value='${row.status}'></button></td>
                                  <td class='text-center'>${jour} ${monthT[month]} ${annés}</td>
                                  <td>${row.nom}</td>
                                  <td>${row.prenom}</td>
                                  <td><textarea class='col-12' disabled>${row.mail}</textarea></td>
                                  <td class='text-center'>${row.nombre_de_séjour}nuits</td>
                                  <td class='text-center'>${row.prix_totale}</td>
                                  <input class='ddD' type='hidden' value='$ddD'>
                            </tr>`;
            
                            $('.tableW').append(tableau3)
                            $('.checkHalf').each(function(index, element){
                                if($(element).val() == "0" || $(element).val() == "null"){
                                    let input1 = $(element).closest('td')
                                    input1.css('background','#f23f3a')
                                }else{
                                    let input = $(element).closest('td')
                                    input.css('background','#00b487')
                                }
                            })
            
                })
            }
            })
        break
    case 'Backup' :
        $.ajax({
            url:'db/backup.php',
            type:'GET',
            dataType:'json',
            success:function(data){
                data.forEach(row =>{
                    const date = new Date(row["date_d'enregistrement"])
                    const jour = date.getDay();
                    const month =date.getMonth();
                    const monthT = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"]
            
                    const annés =date.getFullYear();
                    let id = row.id;
            
                    let tableau2 = `
                         <tr class='tr' meta-data='${row.id}'>
                                  <td class='text-center toVert'><button class='border-0 btn0  text-white'>${row.id}<input type='hidden' class='checkBungalow' name='check' value='${row.bungalow}'></button></td>
                                  <td class='text-center'>${jour} ${monthT[month]} ${annés}</td>
                                  <td>${row.nom}</td>
                                  <td>${row.prenom}</td>
                                  <td><textarea class='col-12' disabled>${row.mail}</textarea></td>
                                  <td class='text-center'>${row.nombre_de_séjour}nuits</td>
                                  <td class='text-center'>${row.prix_totale}</td>
                                  <input class='ddD' type='hidden' value='$ddD'>
                            </tr>`;
            
                            $('.tableB').append(tableau2)
                            $('.checkBungalow').each(function(index, element){
                                if($(element).val() == "" || $(element).val() == "null"){
                                    let input1 = $(element).closest('td')
                                    input1.css('background','#f23f3a')
                                }else{
                                    let input = $(element).closest('td')
                                    input.css('background','#00b487')
                                }
                            })
            
                })
            }
            })
        break
}

}