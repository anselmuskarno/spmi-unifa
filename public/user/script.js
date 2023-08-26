
const p3 = document.querySelector('.p3');
const p4 = document.querySelector('section#b p');
const sectionB = document.querySelector('section#b');
const p5 = sectionB.getElementsByTagName('p')[1];
const ul = sectionB.getElementsByTagName('ul')[0];

//Ketika Sebuah elemen diklik

//Cara 1
p3.setAttribute('onclick', 'ubahWarna()');

function ubahWarna() {
    p3.style.backgroundColor = 'red';
    p3.style.color = 'white';
}

let textBaru = document.createTextNode('item ' + '0');
let int_nilai_1 = 1;
//Cara 2
p4.addEventListener('click', function () {
    if (int_nilai_1 < 1) {
        int_nilai_1 = 1;
    }
    // if (int_nilai_1 == 7) {
    //     alert('ok bro');
    // }
    // alert('ok bro');

    nilai_1 = int_nilai_1.toString();
    textBaru = document.createTextNode('item ' + nilai_1);

    const liBaru = document.createElement('li');
    liBaru.appendChild(textBaru);
    // liBaru.appendChild(textBaru);
    // console.log(ul);
    ul.appendChild(liBaru);
    liBaru.setAttribute('value', nilai_1);
    int_nilai_1 += 1;
    console.log(int_nilai_1);

    console.log(liBaru);

});

p5.addEventListener('click', function () {
    if (int_nilai_1 < 1) {
        int_nilai_1 = 1;
    }
    int_nilai_1 -= 1;
    console.log(int_nilai_1);
    ul.removeChild(document.getElementsByTagName('li')[document.querySelectorAll('li').length - 1]);

})

// console.log(int_nilai_1);