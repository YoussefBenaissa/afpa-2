function moyenne(tab) {
  if (tab == 0) {
    return 0;
  }
  if (tab == 20) {
    return "pk tu triche";
  }
  let somme = 0;
  let i;
  for (i = 0; i < tab.length; i++) {
    somme += tab[i];
  }
  return somme / tab.length;
}
tab = [15, 10, 13, 12, 11];
tab2 = [20, 15, 20, 18, 17, 14, 15];
tab0 = [];
tab20 = [20];
console.log(moyenne(tab2));
console.log(moyenne(tab));
console.log(moyenne(tab0));
console.log(moyenne(tab20));
tabmax = [16, 3.9, 5.3];

function valeurmax(tab) {
  let max = tab[0];
  let i;
  for (i = 0; i < tab.length; i++) {
    if (max < tab[i]) {
      max = tab[i];
    }
  }
  return max;
}
console.log(valeurmax(tabmax));

function valeurmin(tab) {
  let min = tab[0];
  let i;
  for (i = 0; i < tab.length; i++) {
    if (min > tab[i]) {
      min = tab[i];
    }
  }
  return min;
}
console.log(valeurmin(tab2));

function Position(tab, val) {
  let i;
  for (i = 0; i < tab.length; i++) {
    if (tab[i] == val) {
      return i + 1;
    }
  }
  return x;
}

tabp = [3, 6, 9.2, 8, 7, 1];
tabx = [3, 2, 5, 9, 8, 4, 5, 2];

console.log(Position(tabp, 8));
console.log(Position(tabx, 8));

function PositionWhile(tab, val) {
  let i = 0;
  while (i < tab.length) {
    if (tab[i] == val) {
      return i + 1;
    }
    i++;
  }
}
console.log(PositionWhile(tabp, 8));

function nbrdays(mois, annee) {
  tabMois = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
  if (mois == 2) {
    if (annee % 4 == 0) {
      return 29;
    }
    return 28;
  }
  return tabMois[mois - 1];
}

console.log(nbrdays(2, 2020));

function nbrswitch(mois, annee) {
  tabMois = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

  switch (true) {
    case mois == 2 && annee % 4 == 0 && annee % 100 != 0:
      return 29;

    default:
      return tabMois[mois - 1];
  }
}
console.log(nbrswitch(10, 2016));
let chaine = "abcdefghij";

function inversechaine(chaine) {
  chaineinver = "";
  for (i = chaine.length - 1; i >= 0; i--) {
    chaineinver += chaine[i];
  }
  return chaineinver;
}

console.log(inversechaine(chaine));

let chaineDeMots = "bonjour salut cava oui et toi hmdl et toi";
/*function nbrDemots(chaine) {
  let mots = 0;
  for (i = 0; i < chaine.length; i++) {
    if (chaine[i] == " ") {
      mots += 1;
    }
  }

  return mots + 1;
}*/

function nbrDeMots(chaine) {
  return chaine.split(" ").length;
}
console.log(nbrDeMots(chaineDeMots));

let chaine2 = "bonjour salut cava oui et toi hmdl et toi";

function compareDeuxchaines(chaine1, chaine2) {
  return nbrDeMots(chaine1) == nbrDeMots(chaine2);
}
console.log(compareDeuxchaines(chaineDeMots, chaine2));

function carreNbr(nbr) {
  return nbr ** 2;
}
console.log(carreNbr(4));

function racineCarré(nbr1) {
  if (nbr1 < 0) {
    return -1;
  }
  return nbr1 ** (1 / 2);
}
console.log(racineCarré(25));

function perimettreRectangle(a, b) {
  return 2 * (a + b);
}
console.log(perimettreRectangle(5, 2));
/* il existe des fonctions prédéfinie :
 Pour la function au carre nous allons utiliser Math.pow(5,2).
 Pour la fonction racine carré on utilise  Math.sqrt(25).*/

function somme(a, b) {
  return a + b <= 100;
}
console.log(somme(50, 60));

function convertirHm(a, b) {
  let h = a * 3600;
  let m = b * 60;
  tab = [h, m];
  return tab;
}
console.log(convertirHm(1, 2));
function divisible(a, b) {
  return a % b == 0;
}
console.log(divisible(3, 2));

tab25 = [1, 2, 3, 4, 5];

function inverseTab(tab) {
  newTab = [];
  for (i = tab.length - 1; i >= 0; i--) {
    newTab.push(tab[i]);
  }
  return newTab;
}
console.log(inverseTab(tab25));

let tabInfo = [
  { Nom: "xavier", prenom: "bertrand", age: 65, revenu: 2500 },
  { Nom: "youssef", prenom: "benaissa", age: 25, revenu: 100 },
  { Nom: "stop", prenom: "salut", age: 32, revenu: 3500 },
  { Nom: "hel", prenom: "no", age: 15, revenu: 15 },
  { Nom: "llo", prenom: "dfs", age: 22, revenu: 3500 },
  { Nom: "lo", prenom: "nghj", age: 19, revenu: 4500 },
  { Nom: "abc", prenom: "njh", age: 18, revenu: 1000 },
  { Nom: "cda", prenom: "naz", age: 60, revenu: 1105 },
  { Nom: "rty", prenom: "nzer", age: 45, revenu: 2500 },
  { Nom: "sdq", prenom: "qs", age: 25, revenu: 500 },
];
// pas de quote sur les nombres//
// pour cibler une cle on utilise tab[0].revenu etc..//

function impot(revenu) {
  switch (true) {
    case revenu <= 1000:
      return revenu * 0.05;

    case revenu <= 2000:
      return revenu * 0.07;
    case revenu <= 3000:
      return revenu * 0.11;
    default:
      return revenu * 0.15;
  }
}

function secu(revenu) {
  switch (true) {
    case revenu <= 1000:
      return revenu * 0.05;

    case revenu <= 2000:
      return revenu * 0.06;
    case revenu <= 3000:
      return revenu * 0.08;
    default:
      return revenu * 0.12;
  }
}

function catégorieAge(age) {
  switch (true) {
    case age <= 10:
      return "enfants";
    case age <= 18:
      return "ado";
    case age <= 45:
      return "jeunes";
    default:
      return "vieux";
  }
}

function infoPerson(tab) {
  let info = "";
  for (i = 0; i < tab.length; i++) {
    info +=
      "le nom est" +
      " " +
      tab[i].Nom +
      " " +
      "le prenom est" +
      " " +
      tab[i].prenom +
      " " +
      " la secu = " +
      secu(tab[i].revenu) +
      " " +
      " les impots =" +
      impot(tab[i].revenu) +
      "  " +
      "categorie age =" +
      catégorieAge(tab[i].age) +
      "\n";
  }
  return info;
}
console.log(infoPerson(tabInfo));

function notesEtudiant(notes) {
  switch (true) {
    case notes <= 10:
      return "nul";
    case notes <= 15:
      return "bien";

    default:
      return "tres bien";
  }
}

