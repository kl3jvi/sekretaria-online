/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function logOut() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.my-fancy-container')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

window.onload = function() {
    document.getElementById('stud-reg').style.display = 'none';
    document.getElementById('grupi').style.display = 'none';

}

function studentCheck() {
    if (document.getElementById('student').checked) {
        document.getElementById('stud-reg').style.display = 'block';
        document.getElementById('grupi').style.display = 'block';
    } else {
        document.getElementById('stud-reg').style.display = 'none';
        document.getElementById('grupi').style.display = 'none';
    }
}


window.onload = function() {
    var table = document.getElementById('tabela-e-notave');
    if(table !==null){
        calculateMesatare(table);
    }
    }
    // ky llogarit mesataren duke mar cdo vlere te kollones se dyte qe i perket notave dhe llogarit mesataren e thjeshte;
function calculateMesatare(table) {
    

    var sum = 0;
    var numri_notave = table.rows.length;

    for (var r = 1, n = table.rows.length; r < n; r++) {
        var num = parseFloat(table.rows[r].cells[1].innerHTML);
        sum += num;
    }

    document.getElementById('mesatare').innerHTML = "Mesatarja e thjeshte eshte = " + sum / numri_notave;


}





function downloadPDFWithBrowserPrint() {

    var pdf = new jsPDF('p', 'pt', 'letter');
    pdf.text(100, 500, 'Hello world!\n')
    pdf.fromHTML(document.querySelector('#printable'));

    pdf.save('Liste_notash.pdf');
};