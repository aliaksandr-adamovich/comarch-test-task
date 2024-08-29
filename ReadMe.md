
<p align="center" dir="auto"><a href="https://symfony.com" rel="nofollow">
    <img src="https://camo.githubusercontent.com/47b907183dfe5a33584df734e8a9bc304c3266b0b9c1e37b4c46b4b039601f5c/68747470733a2f2f73796d666f6e792e636f6d2f6c6f676f732f73796d666f6e795f64796e616d69635f30312e737667" alt="Symfony Logo" data-canonical-src="https://symfony.com/logos/symfony_dynamic_01.svg" style="max-width: 100%;">
</a></p>

## Zadanie rekrutacyjne PHP Developer

Opis projektu

Ten projekt jest aplikacją do wysyłania wiadomości e-mail do użytkowników zgrupowanych według określonych kategorii. Umożliwia użytkownikom wybór kategorii, a następnie wysyłanie wiadomości e-mail do wszystkich użytkowników przypisanych do wybranej kategorii.


## Komentarze

- Główna logika biznesowa dotycząca wysyłania wiadomości e-mail została przeniesiona do klasy serwisowej (EmailService), co pozwala na łatwiejsze zarządzanie kodem i jego ewentualne rozbudowanie w przyszłości.
- Aplikacja wykorzystuje Doctrine do zarządzania danymi użytkowników i kategoriami.


## Konfiguracja projektu

1. Sklonuj repozytorium na swój komputer

2. Stwórz wirtualne środowisko

3. Przejdź do katalogu projektu

4. Zainstaluj zależności:   `` composer install``

5. Skopiuj plik .env.dist w .env:  ``  cp .env.dist .env``

6. Wygeneruj klucz aplikacji:`` php bin/console security:generate-key``

7. Skonfiguruj połączenie z bazą danych w pliku .env:

``` 
DATABASE_URL="mysql://database_username:database_password@127.0.0.1:3306/database_name"

```

8. Wykonaj migracje, aby utworzyć tabele w bazie danych:``php bin/console doctrine:migrations:migrate``


9. Uruchom serwer aplikacji :``symfony server:start``


Po uruchomieniu serwera aplikacji, możesz otworzyć przeglądarkę i przejść do http://localhost:8000/email/send, aby zobaczyć formularz wysyłania wiadomości e-mail.
