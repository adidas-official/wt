function getData() {
    // console.log('sanity check');

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const json = this.responseText;
            const obj = JSON.parse(json);

            createTable(obj);

        }
        else return -1;
    }

    xhttp.open('get', 'data.json', true);
    xhttp.send();

}

function createTable(jsonData) {
    // console.log(jsonData);

    const tableTag = $('#rowsOfData');
    tableTag.html('');
    let content = '';
    $.each(jsonData, function (indexInArray, valueOfElement) { 
        content += '<tr>';
        content += '<td>' + valueOfElement['name'] + '</td>';
        content += '<td>' + valueOfElement['description'] + '</td>';
        content += '<td>' + valueOfElement['price'] + '</td>';
        content += '</tr>';
    });
    tableTag.append(content);
}

function getName() {

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const name = this.responseText;

            $('#name').html(name);

        }
        else return -1;
    }

    xhttp.open('get', 'name.txt', true);
    xhttp.send();

}

$('#s03 button').click(function() {
    // console.log('sanity check');

    const num1 = $(this).siblings('#num1').val();
    const num2 = $(this).siblings('#num2').val();
    const operation = $(this).attr('data-operation');

    console.log(num1, num2, operation);

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const answer = this.responseText;

            $('#answer').text(answer);

        }
    }
    const url = 'calc.php?num1=' + num1 + '&num2=' + num2 + '&operator=' + operation;
    xhttp.open('get', url, true);
    xhttp.send();


});