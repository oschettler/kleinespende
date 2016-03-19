(function($, pusher) {

    var channel = pusher.subscribe('receiverUpdated');

    //channel.bind_all(function(data) {
    channel.bind('Kleinespende\\Events\\ReceiverUpdated', function(data) {
        //if (typeof data.receiver !== 'undefined') {
            $('#open-donations').text(data.receiver.open_donations);
            $('#month-total-donations').text(data.receiver.month_total_donations);
            $('#remaining-amount').text(data.receiver.donation_threshold - data.receiver.open_donations);
        //}
    });

})(jQuery, pusher);
