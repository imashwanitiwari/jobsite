/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var ONE_TO_NINETEEN = [
  "one", "two", "three", "four", "five",
  "six", "seven", "eight", "nine", "ten",
  "eleven", "twelve", "thirteen", "fourteen", "fifteen",
  "sixteen", "seventeen", "eighteen", "nineteen"
];

var TENS = [
  "ten", "twenty", "thirty", "forty", "fifty",
  "sixty", "seventy", "eighty", "ninety"
];

var SCALES = ["thousand", "million", "billion", "trillion"];

// helper function for use with Array.filter
function isTruthy(item) {
  return !!item;
}

// convert a number into "chunks" of 0-999
function chunk(number) {
  var thousands = [];

  while(number > 0) {
    thousands.push(number % 1000);
    number = Math.floor(number / 1000);
  }

  return thousands;
}

// translate a number from 1-999 into English
function inEnglish(number) {
  var thousands, hundreds, tens, ones, words = [];

  if(number < 20) {
    return ONE_TO_NINETEEN[number - 1]; // may be undefined
  }

  if(number < 100) {
    ones = number % 10;
    tens = number / 10 | 0; // equivalent to Math.floor(number / 10)

    words.push(TENS[tens - 1]);
    words.push(inEnglish(ones));

    return words.filter(isTruthy).join("-");
  }

  hundreds = number / 100 | 0;
  words.push(inEnglish(hundreds));
  words.push("hundred");
  words.push(inEnglish(number % 100));

  return words.filter(isTruthy).join(" ");
}

// append the word for a scale. Made for use with Array.map
function appendScale(chunk, exp) {
  var scale;
  if(!chunk) {
    return null;
  }
  scale = SCALES[exp - 1];
  return [chunk, scale].filter(isTruthy).join(" ");
}
function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}
function count() {
    $.ajax({
        type: "POST",
        cache: false,
        url: "http://"+window.location.host+":3035/index_stats",
        datatype: "json",
        success: function (result) {

            document.getElementById('trans').innerHTML = toTitleCase(chunk(result.data[0].TRANS).map(inEnglish).map(appendScale).filter(isTruthy).reverse().join(" "));
            document.getElementById('customers').innerHTML = toTitleCase(chunk(result.data[0].CUSTS).map(inEnglish).map(appendScale).filter(isTruthy).reverse().join(" "));
            document.getElementById('amount').innerHTML = toTitleCase(chunk(result.data[0].AMOUNT).map(inEnglish).map(appendScale).filter(isTruthy).reverse().join(" "));
            count();
            //sweep();
        },
        error: function(err) {
            console.log(err);
            document.getElementById('trans').innerHTML = 50202510;
            document.getElementById('customers').innerHTML = 105334;
            document.getElementById('amount').innerHTML = 54545555115;
            count();
            //sweep();
        }
    });
}
/*
function sweep(){
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}
*/
