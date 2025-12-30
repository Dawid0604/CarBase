
# 🚗 CarBase - System Zarządzania Pojazdami

> Aplikacja webowa do zarządzania markami i modelami samochodów.
> Projekt portfolio demonstrujący przejście Java Developer → PHP/Laravel.

[![PHP Version](https://img.shields.io/badge/PHP-8.4-777BB4?logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Tests](https://img.shields.io/badge/Tests-Pest%20PHP-00E6B8?logo=pest&logoColor=white)](https://pestphp.com)

---

## 📌 Context

Ten projekt powstał jako **demonstracja moich umiejętności** w ekosystemie PHP/Laravel. Mam **3 lata doświadczenia komercyjnego w Javie** (Spring Boot, Hibernate, Maven) i aktualnie przechodzę do PHP/Laravel, wykorzystując doświadczenie w enterprise development.

**Dlaczego ten projekt wart uwagi:**
- ✅ Kod pisany z perspektywą **enterprise patterns** znanych z Javy
- ✅ Silne typowanie (PHP 8.4 strict types) - podobne do Javy
- ✅ Testy na poziomie znanych z JUnit/Mockito
- ✅ CI/CD pipeline (GitHub Actions) - porównywalny z Jenkins/GitLab CI
- ✅ Dependency Injection i SOLID - koncepcje przeniesione z Spring

---

## 🎯 O Projekcie

**Problem biznesowy:**
Firmy motoryzacyjne często przechowują dane o pojazdach w rozproszonych spreadsheetach lub przestarzałych systemach, co utrudnia współpracę i integrację z innymi narzędziami.

**Rozwiązanie:**
Centralna aplikacja webowa z REST API, umożliwiająca:
- Zarządzanie markami i modelami pojazdów
- Łatwą integrację z istniejącymi systemami (API-first approach)
- Współpracę zespołową z audytem zmian
- Szybkie wyszukiwanie i filtrowanie danych

**Wartość biznesowa:**
- 🚀 Skrócenie czasu dostępu do danych z minut do sekund
- 🔒 Centralizacja wiedzy - jedno źródło prawdy
- 🔗 Gotowość do integracji z CRM, ERP, aplikacjami mobilnymi
- 📊 Możliwość raportowania i analizy danych

---

## 🛠️ Stack Technologiczny

### Backend
| Technologia | Wersja |
|-------------|--------|
| **PHP** | 8.4 |
| **Laravel** | 12 |
| **Eloquent ORM** | 12 |
| **MySQL** | 8.0.36 | MySQL |
| **Bootstrap** | 5 |

### Jakość Kodu & Testowanie
| Narzędzie | Cel |
|-----------|-----|
| **Pest PHP** | Testing framework |
| **PHPStan** | Statyczna analiza |
| **Psalm** | Type checker  |
| **PHPMD** | Code smells  |

### DevOps & Narzędzia
- **GitHub Actions** - CI/CD pipeline
- **Composer** - zarządzanie zależnościami

### Wzorce i Praktyki
- ✅ **Repository Pattern** - abstrakcja warstwy danych
- ✅ **Service Layer** - logika biznesowa oddzielona od kontrolerów
- ✅ **Value Objects** - niezmienne obiekty domenowe (DDD)
- ✅ **DTOs** - transfer danych między warstwami
- ✅ **Dependency Injection** - przez konstruktor
- ✅ **SOLID**

---

## ✨ Funkcjonalności

### Zaimplementowane
- ✅ **Marki** - Wyświetlanie wszystkich marek
- ✅ **Silniki - list** - Wyświetlanie wszystkich silników danej marki
- ✅ **Silniki - details** - Wyświetlanie wszystkich szczegółów danego silnika
- ✅ **Silniki - user review form** - przygotowany formularz do tworzenia opinii silnika
- ✅ **Automatyczne generowanie slug'ów** - SEO-friendly URLs
- ✅ **Walidacja na wielu poziomach** - Form Requests, DTOs, Value Objects

### W Roadmapie
- 🔲 **Database Transactions** - ACID compliance
- 🔲 **System ról i uprawnień** - Admin, Manager, User
- 🔲 **REST API z dokumentacją** - OpenAPI/Swagger
- 🔲 **Eksport danych** - CSV, Excel, PDF
- 🔲 **Cache layer** - Redis
- 🔲 **Queue/Jobs** - asynchroniczne przetwarzanie
- 🔲 **E2E tests** - testy E2E
- 🔲 **Connection pool** - optymalizacja połączeń bazodanowych
- 🔲 **Utworzenie katalogu z konfiguracją PHP** - zawrzeć tam gotowe configi dla dev, prod oraz zoptymalizować intepreter PHP (np. opcache)
