let formAddToLikes = document.querySelectorAll('.add-to-like');
// console.log(formAddToLikes); 
for (let i=0; i<formAddToLikes.length; i++)
{
    if(formAddToLikes[i]){
        
        formAddToLikes[i].addEventListener('submit', function(e){
            
            e.preventDefault();
            // console.log(formAddToLikes[i]);
            
            const dataLike = new FormData(formAddToLikes[i]);
            // let dataLike = Object.fromEntries(new FormData(e.target).entries()); 
            // console.log(dataLike);
            axios.post('/like/add', dataLike)
            .then(function(response){
            console.log(response.data);   
            // console.log(response.data);
            });  
        });
    }
}

let formDeleteLikes = document.querySelectorAll('.dell-like');
// console.log(formDeleteLikes);
for (let i=0; i<formDeleteLikes.length; i++)
{
    if(formDeleteLikes[i]){
        // console.log(formDeleteLikes[i]); 
        formDeleteLikes[i].addEventListener('submit', function(e){
            e.preventDefault();        
            const dataDelLike = new FormData(formDeleteLikes[i]);
            console.log(dataDelLike);
            axios.post('/like/dell', dataDelLike)
            .then(function(response){
            console.log(response.data);           
            });   
        });
    }
}