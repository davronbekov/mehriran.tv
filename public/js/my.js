var createButton = function (fileId, cost, userId){
    paypal.Button.render({
        env: 'sandbox', // Or 'sandbox',

        commit: true, // Show a 'Pay Now' button

        style: {
            color: 'blue',
            size: 'responsive',
            shape: 'rect',
            label: 'buynow',
        },

        payment: function(data, actions) {
            /*
             * Set up the payment here
             */
            fetch('/api/paypal/create?user_id='+userId+'&amount='+cost+'&file_id='+fileId).then(function(response) {
                return response.json();
            }).then(function(res) {
                data(res.token);
            });
        },

        onAuthorize: function(data, actions) {
            /*
             * Execute the payment here
             */
            console.log(data);
            // window.location.replace(data.returnUrl)
            // data('1GE959833M427670U')
        },
        onCancel: function(data, actions) {
            /*
             * Buyer cancelled the payment
             */
            alert('Payment canceled!');
        },
        onError: function(err) {
            /*
             * An error occurred during the transaction
             */
            alert('Try later! ' + err.message);
        }
    }, '#paypal-button'+fileId);
}
