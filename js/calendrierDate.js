$(function () {

    // Check les disponibilités 
    function unavailable(date) {
        ymd = ("0" + date.getDate()).slice(-2) + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();

        if ($.inArray(ymd, unavailableDates) < 0) {

            return [true, "enabled", "Available"];

        } else {
            return [false, "red", "Booked Out"];
        }
    }

    // Inititalisation datepicker pour checkin
    $('#txtFromDate1').datepicker({
        beforeShowDay: unavailable,
        dateFormat: 'dd-mm-yy',
        minDate: 0,
        onSelect: function (dateText) {
            $("#txtFromDate1").val(dateText);

            // Check si c'est l'id de la maison correspond à 25 (Jolie maison de ville)
            if (room.toString() == 25) {
                returnPriceMaisonVille();
            }
            // Check si c'est l'id de la maison correspond à 24 (Chalet Bord de Mer)
            else if (room.toString() == 24) {
                returnPriceChaletMer();
            }
            // Check si c'est l'id de la maison correspond à 26 (Chalet montagne)
            else if (room.toString() == 26) {
                returnPriceChaletMontagne();
            }
            // Check si c'est l'id de la maison correspond à 23 (Villa grand large)
            else if (room.toString() == 23) {
                returnPriceGrandLarge();
            }

        }
    });

    // Inititalisation datepicker pour checkout
    $('#txtFromDate2').datepicker({
        beforeShowDay: unavailable,
        dateFormat: 'dd-mm-yy',
        minDate: 0,
        onSelect: function (dateText) {
            $("#txtFromDate2").val(dateText);

            // Check si c'est l'id de la maison correspond à 25 (Jolie maison de ville)
            if (room.toString() == 25) {
                returnPriceMaisonVille();
            }
            // Check si c'est l'id de la maison correspond à 24 (Chalet Bord de Mer)
            else if (room.toString() == 24) {
                returnPriceChaletMer();
            }
            // Check si c'est l'id de la maison correspond à 26 (Chalet montagne)
            else if (room.toString() == 26) {
                returnPriceChaletMontagne();
            }
            // Check si c'est l'id de la maison correspond à 23 (Villa grand large)
            else if (room.toString() == 23) {
                returnPriceGrandLarge();
            }
        }
    });
    $.datepicker.setDefaults($.datepicker.regional["fr"]);


});

/** 
 * @from= date debut de periode
 * @to = date debut de periode
 * @price = prix en fonction de la periode
 */
function dateCheck(from2, to2, price) {

    var fDate, lDate, cDate;

    fDate = jQuery.datepicker.formatDate('dd-mm-yy', from2); // MM/DD/yy firstdate
    cDate = jQuery.datepicker.parseDate('dd-mm-yy', $('#txtFromDate1').val()); // date from form
    lDate = jQuery.datepicker.formatDate('dd-mm-yy', to2); // MM/DD/yy

    var dateFrom = fDate.split("-");
    var dateTo = lDate.split("-");

    var from = new Date(dateFrom[2], parseInt(dateFrom[1]) - 1, dateFrom[0]); // -1 because months are from 0 to 11
    var to = new Date(dateTo[2], parseInt(dateTo[1]) - 1, dateTo[0]);

    /* Calcul le nombre de jour entre la date d'arrivée et le départ */
    var d1 = $('#txtFromDate1').datepicker('getDate');
    var d2 = $('#txtFromDate2').datepicker('getDate');

    var oneDay = 24 * 60 * 60 * 1000;
    var diff = 0;
    if (d1.getTime() < d2.getTime()) {

        diff = Math.round(Math.abs((d2.getTime() - d1.getTime()) / (oneDay)));

    } else {
        $('.col_price h4').html('Date non valide');
        return false;

    }
    //

    /** Renvoie le prix en fonction du nombre de jour et de la periodec*/
    if ((cDate <= to && cDate >= from)) {

        // Rempli la valeur de l'input price
        $('input[name="price"]').attr('value', price * diff);

        //Affiche le prix dans un élément du dom
        $('.col_price h4').html((diff * price) + '€');

    } else {
        return false
    }
    //
}
//

function returnPriceMaisonVille() {

    // 2022
    dateCheck(new Date('12-08-21'), new Date('01-02-22'), '210');
    dateCheck(new Date('01-03-22'), new Date('02-03-22'), '180'); // MM/DD/yy
    dateCheck(new Date('02-04-22'), new Date('03-06-22'), '210');
    dateCheck(new Date('03-07-22'), new Date('04-07-22'), '180');
    dateCheck(new Date('04-08-22'), new Date('05-08-22'), '210');
    dateCheck(new Date('05-09-22'), new Date('05-24-22'), '180');
    dateCheck(new Date('05-25-22'), new Date('05-29-22'), '210');
    dateCheck(new Date('05-30-22'), new Date('06-30-22'), '180');
    dateCheck(new Date('07-01-22'), new Date('11-13-22'), '210');
    dateCheck(new Date('11-14-22'), new Date('12-15-22'), '180');
    dateCheck(new Date('12-16-22'), new Date('01-02-23'), '210');

    // 2023
    dateCheck(new Date('01-03-23'), new Date('02-03-23'), '180'); // MM/DD/yy
    dateCheck(new Date('02-04-23'), new Date('03-06-23'), '210');
    dateCheck(new Date('03-07-23'), new Date('04-07-23'), '180');
    dateCheck(new Date('04-08-23'), new Date('05-08-23'), '210');
    dateCheck(new Date('05-09-23'), new Date('05-24-23'), '180');
    dateCheck(new Date('05-25-23'), new Date('05-29-23'), '210');
    dateCheck(new Date('05-30-23'), new Date('06-30-23'), '180');
    dateCheck(new Date('07-01-23'), new Date('11-13-23'), '210');
    dateCheck(new Date('11-14-23'), new Date('12-15-23'), '180');
    dateCheck(new Date('12-16-23'), new Date('01-02-24'), '210');
}

function returnPriceChaletMer() {

    // 2022
    dateCheck(new Date('12-08-21'), new Date('01-02-22'), '230');
    dateCheck(new Date('01-03-22'), new Date('02-03-22'), '210'); // MM/DD/yy
    dateCheck(new Date('02-04-22'), new Date('03-06-22'), '230');
    dateCheck(new Date('03-07-22'), new Date('04-07-22'), '210');
    dateCheck(new Date('04-08-22'), new Date('05-08-22'), '230');
    dateCheck(new Date('05-09-22'), new Date('05-24-22'), '210');
    dateCheck(new Date('05-25-22'), new Date('05-29-22'), '230');
    dateCheck(new Date('05-30-22'), new Date('06-30-22'), '210');
    dateCheck(new Date('07-01-22'), new Date('11-13-22'), '230');
    dateCheck(new Date('11-14-22'), new Date('12-15-22'), '210');
    dateCheck(new Date('12-16-22'), new Date('01-02-23'), '230');

    // 2023
    dateCheck(new Date('01-03-23'), new Date('02-03-23'), '210'); // MM/DD/yy
    dateCheck(new Date('02-04-23'), new Date('03-06-23'), '230');
    dateCheck(new Date('03-07-23'), new Date('04-07-23'), '210');
    dateCheck(new Date('04-08-23'), new Date('05-08-23'), '230');
    dateCheck(new Date('05-09-23'), new Date('05-24-23'), '210');
    dateCheck(new Date('05-25-23'), new Date('05-29-23'), '230');
    dateCheck(new Date('05-30-23'), new Date('06-30-23'), '210');
    dateCheck(new Date('07-01-23'), new Date('11-13-23'), '230');
    dateCheck(new Date('11-14-23'), new Date('12-15-23'), '210');
    dateCheck(new Date('12-16-23'), new Date('01-02-24'), '230');
}

function returnPriceChaletMontagne() {

    // 2022
    dateCheck(new Date('12-08-21'), new Date('01-02-22'), '420');
    dateCheck(new Date('01-03-22'), new Date('02-03-22'), '357'); // MM/DD/yy
    dateCheck(new Date('02-04-22'), new Date('03-06-22'), '420');
    dateCheck(new Date('03-07-22'), new Date('04-07-22'), '357');
    dateCheck(new Date('04-08-22'), new Date('05-08-22'), '420');
    dateCheck(new Date('05-09-22'), new Date('12-16-22'), '357');
    dateCheck(new Date('12-17-22'), new Date('01-02-23'), '420');

    // 2023
    dateCheck(new Date('01-03-23'), new Date('02-03-23'), '357'); // MM/DD/yy
    dateCheck(new Date('02-04-23'), new Date('03-06-23'), '420');
    dateCheck(new Date('03-07-23'), new Date('04-07-23'), '357');
    dateCheck(new Date('04-08-23'), new Date('05-08-23'), '420');
    dateCheck(new Date('05-09-23'), new Date('12-16-23'), '357');
    dateCheck(new Date('12-17-23'), new Date('01-02-24'), '420');

}

function returnPriceGrandLarge() {

    // 2022
    dateCheck(new Date('12-9-21'), new Date('01-02-22'), '740');
    dateCheck(new Date('01-02-22'), new Date('05-07-22'), '640'); // MM/DD/yy
    dateCheck(new Date('05-08-22'), new Date('05-21-22'), '530');
    dateCheck(new Date('05-22-22'), new Date('06-04-22'), '640');
    dateCheck(new Date('06-05-22'), new Date('07-02-22'), '530');
    dateCheck(new Date('07-03-22'), new Date('09-03-22'), '640');
    dateCheck(new Date('09-04-22'), new Date('10-21-22'), '530');
    dateCheck(new Date('10-22-22'), new Date('11-12-22'), '640');
    dateCheck(new Date('11-13-22'), new Date('12-16-22'), '530');
    dateCheck(new Date('12-17-22'), new Date('01-01-23'), '740');

    // 2023
    dateCheck(new Date('01-02-23'), new Date('05-07-23'), '640'); // MM/DD/yy
    dateCheck(new Date('05-08-23'), new Date('05-21-23'), '530');
    dateCheck(new Date('05-22-23'), new Date('06-04-23'), '640');
    dateCheck(new Date('06-05-23'), new Date('07-02-23'), '530');
    dateCheck(new Date('07-03-23'), new Date('09-03-23'), '640');
    dateCheck(new Date('09-04-23'), new Date('10-21-23'), '530');
    dateCheck(new Date('10-22-23'), new Date('11-12-23'), '640');
    dateCheck(new Date('11-13-23'), new Date('12-16-23'), '530');
    dateCheck(new Date('12-17-23'), new Date('01-01-24'), '740');
}