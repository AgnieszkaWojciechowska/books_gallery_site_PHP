Temat projektu: aplikacja galerii ksiazek

Funkcyjna implementacja wzorca MVC: front-controller, routing, kontrolery, model,
widoki + wydzielona logika biznesowa.

Zrealizowanie etapy projektu:
1. funkcja przesyłania plikow na serwer do katalogu DocumentRoot/images
2. generowanie znaku wodnego i miniaturki 200x125 pikseli (PHP GD)
3. wyswietlanie galerii przeslanych zdjec (miniaturka, po kliknieciu przek. do znak wodny)
4. zapisywanie danych o zdjeciu w bazie MongoDB
5. rejestracja i logowanie uzytkownikow, baza MongoDB
6. mechanizm sesji (zaznaczanie zdjec przez uzytkownika)
7. rozroznianie uzytkownikow - dodatkowe funkcje dla zalogowanych: wyswietlanie loginu uzytkownika w polu autor, opcje prywatnej/publicznej ksiazki
8. wyszukiwarka ksiazek AJAX w trakcie wpisywania (onkeyup)

