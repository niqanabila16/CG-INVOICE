/** main.js cginvoice * version: 1.0.1 
 * @vars reference
 * #qt = .quantitys 
 * #descr = .description
 * #rate = .prices
 * #amt  = .totalzz
 * #sumValue = .sumvalue
 * #sumTotal = .sumtotal
 * #tax = .tax
 * #invTotal = totalx
 */
 
function currencyFormat (num) {
    return "$" + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

// no event tied to sumtotal (sub) 
// @uses onclick
function sendSumVal() { 
    // grab sums and tax
    var sumtotals = parseFloat($('#sumTotal').val()); //subTtl
    var tax = $('.tax').val();
    if( tax === 'undefined' ) tax = 0;
    tax = parseFloat(tax / 10);
    
    //bail if not tax    
    var ttl = parseFloat($('#invTotal').val());
    var suma = sumtotals * tax;
    var sumb = '';
    
    //if total field is blank then this is the first tax calculation
    if( ttl == '' ) { 
    sumb = (sumtotals * 1) + suma;
    $('#invTotal').val($('#invTotal').val() + sumb.toFixed(2)); 
    
        // grab any new subtotal and then clear the last total before summing
        } else {
        $('#invTotal').val('');
        $('#rollTax').val('');
        sumb = (sumtotals * 1) + suma;
        $('#invTotal').val($('#invTotal').val() + sumb.toFixed(2)); 
    }   
        
        $('#rollTax').val($('#rollTax').val() + suma.toFixed(2)); 
}

 
function addTextArea(){

    //textarea strs
    var qt    = $('#qt').val();
    var descr = $('#descr').val();
    var rate  = $('#rate').val();
    var amt   = $('#amt').val(); //amt =totalzz
    
    //send inputs to textarea
    $('#textArea').html($('#textArea')
.text() + "<p>"+ qt + "<span>"+ descr + "</span>"+ "<b><em>"+ rate + "</em>"+ amt + "</b></p>" + "\n");

    //reset all to 0
    $('#qt').val('');
    $('#descr').val('');
    $('#rate').val('');
    $('#amt').val('');     
     
     
}

function addSumVal(){
 
    //sends line ttl to sum field
    var quantities = $('.quantities').val();  
    var prices = $('.prices').val();
    var textV = prices * quantities;
    var textK = '';
    textK = '$' + Math.abs(textV).toFixed(2);
    $('.totalzz').val($('totalzz').text() + textK);
    
    //copy amt to sub ttl field - strip $
    var totalzz = $('.totalzz').val(); 
    //trim left $ from #amt
    var subzz   = totalzz.substr(1);
    
    $('.sumvalue').val($('.sumvalue').val() + subzz + ", ");  

    //send sum to sub total
    var sumvalue= $('#sumValue').val(); 

    var suma = sumvalue.split(','); 
    console.log(suma);
    var sumb = [];
        sumb = suma.reduce(function (previous, current) {
            return  parseFloat(previous *1) + parseFloat(current *1);
        }, '');

    $('.sumtotal').val($('.sumtotal').text() + sumb.toFixed(2) );
}


