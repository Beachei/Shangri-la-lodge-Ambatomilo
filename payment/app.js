const stripe = Stripe('pk_test_51PCGVN01zesrsZipaH60cWEFdi9QNuxqGrzquFhTGH1XZW0OpBQGHxKvO1Tlli2YrsHMvFXzN4uNQ5EhpwS9FYYx000Y8g6Kd0');

const elements = stripe.elements();

const card =  elements.create('card');
card.mount('#card-element');

const form = document.getElementById('form');


form.addEventListener('submit', function(e){
    e.preventDefault();
    stripe.createToken(card).then(function(result) {
        // Handle result.error or result.token
        if(result.token){
            tokenCard(result.token)
        }
      });
    
})
function tokenCard(token){
    const tokenHandler = document.createElement('input');
    tokenHandler.setAttribute('type','hidden');
    tokenHandler.setAttribute('name','tokenID');
    tokenHandler.setAttribute('value',token.id);
    form.appendChild(tokenHandler);

    form.submit()
}

