export class Encrypt {
    invertMap() {
        const obj = {};
        const objArr = Object.entries(map);
        objArr.forEach((item) => {
            obj[item[1]] = item[0];
        })
        return obj;
    }

    encrypt(value) {
        const frase = [];
        (value.split('')).forEach((letter) => {
            frase.push(map[letter]);
        })
        
        return frase.join('');
    }
    
    decrypt(value) {
        const frase = [];
        const dicio = this.invertMap(map);
        (value.split('')).forEach((letter) => {
            frase.push(dicio[letter]);
        })
        
        return frase.join('')
    }
}

const map = {
    a: "x",
    b: "V",
    c: "d",
    d: "O",
    e: "g",
    f: "I",
    g: "i",
    h: "A",
    i: "M",
    j: "D",
    k: "n",
    l: "c",
    m: "W",
    n: "P",
    o: "Y",
    p: "G",
    q: "Z",
    r: "s",
    s: "b",
    t: "C",
    u: "S",
    v: "h",
    w: "#",
    x: "q",
    y: "J",
    z: "F",
    A: "t",
    B: "!",
    C: "p",
    D: "l",
    E: "e",
    F: "R",
    G: "j",
    H: "m",
    I: "&",
    J: "u",
    K: "w",
    L: "H",
    M: "a",
    N: "o",
    O: "!",
    P: "T",
    Q: "@",
    R: "Q",
    S: "r",
    T: "y",
    U: "f",
    V: "k",
    W: "N",
    X: "E",
    Y: "X",
    Z: "B",
    0: "4",
    1: "3",
    2: "1",
    3: "9",
    4: "6",
    5: "2",
    6: "0",
    7: "8",
    8: "7",
    9: "5"
  };
