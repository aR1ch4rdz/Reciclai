function palindromo(string) {
  let palindromo = true;
  for (let i = 0, j = string.length - 1; i < string.length && palindromo; i++, j--){
    palindromo = string[i] == string[j];
  }
  return palindromo;
}

console.log(palindromo("subinoonibus"))

