
var bahasa = {
    en: {
        greating: "WELCOME TO KALDI.ID",
        test: "Just Brew It!",
        test123:  "Kaldi.id was established on April 10, 2021. Founded by 3 people, namely Alan Kurniawan, dr. Ari Wahyuni, SpAn and Dr.Leni Ervina,Sp.A(K), M.Kes. For coffee lovers, the name Kaldi may be familiar. The name Kaldi is taken from a goat herder from Ethiopia. Kaldi is known as the inventor of the world's first coffee bean. The first history of coffee was recorded in 1671 in the form of a book by Antoine Faustus Nairon with the title 'De Saluberrima Cahue Seu Cafe Nuuncupata Dsicurcus' which wrote about Kaldi and goats. With the addition of a vertical plane shape in the middle that points up and down, indicating that you are looking up at your dream high but still grounded" 
    
    },
    id: {
        greating: "Selamat datang di Kaldi.id",
        test: "seduh saja!",
        test123: "Kaldi.id berdiri pada 10 April 2021. Didirikan oleh 3 orang yaitu Alan Kurniawan, dr. Ari Wahyuni, SpAn dan Dr.Leni Ervina,Sp.A(K), M.Kes.  Bagi Pecinta kopi mungkin nama kaldi tidak asing lagi. Nama Kaldi diambil dari seorang pengembala kambing dari Ethiopia. Kaldi dikenal sebagai penemu biji kopi pertama di dunia. Pertama Sejarah kopi terekam pada tahun 1671 dalam bentuk buku oleh Antoine Faustus Nairon dengan judul 'De Saluberrima Cahue Seu Cafe Nuncupata Dsicurcus' yang menuliskan tentang Kaldi dan kambing. Dengan tambahan bentuk bidang vertikal ditengah yang menunjuk keatas dan kebawah, mengisyaratkan menatap tinggi impian namun tetap membumi"
    }
}

if (!localStorage.getItem("lang")) {
    localStorage.setItem("lang", "id")
}

if (localStorage.getItem("lang") == "en") {
    document.getElementById("greating").innerHTML = bahasa.en.greating
    document.getElementById("test").innerHTML = bahasa.en.test
    document.getElementById("test123").innerHTML = bahasa.en.test123
} else {
    document.getElementById("greating").innerHTML = bahasa.id.greating
    document.getElementById("test").innerHTML = bahasa.id.test
    document.getElementById("test123").innerHTML = bahasa.id.test123
}

function gantiBahasa() {
    if (localStorage.getItem("lang") == "en") {
        localStorage.setItem("lang", "id")
    } else (
        localStorage.setItem("lang", "en")
    )
    window.location.reload()
}