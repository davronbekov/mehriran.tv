var createButton = function (tariffId, userId){
    paypal.Button.render({
        env: 'sandbox', // Or 'sandbox',

        commit: true, // Show a 'Pay Now' button

        style: {
            color: 'gold',
            size: 'responsive',
            shape: 'rect',
            // label: 'buynow',
        },

        payment: function(data, actions) {
            /*
             * Set up the payment here
             */
            fetch('/api/paypal/create?user_id='+userId+'&tariff_id='+tariffId).then(function(response) {
                return response.json();
            }).then(function(res) {
                console.log(res);
                data(res.token);
            });
        },

        onAuthorize: function(data, actions) {
            /*
             * Execute the payment here
             */
            window.location.replace(data.returnUrl)
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
    }, '#paypal-button'+tariffId);
}
