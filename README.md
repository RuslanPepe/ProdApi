# TestProdApi

#### Парсинг данных по API:


## Структура моделей

- `User` — пользователи
- `Stock` — склад/товары
- `Sale` — продажи
- `Order` — заказы
- `Income` — доходы

## Быстрый старт

### Через Docker

```bash
cd _docker
docker-compose up -d
```
```
http://localhost:8000 - проект API.
http://localhost:8080 - phpmyadmin.
```

## API Endpoints

Все endpoints находятся в `/api/`:

| Метод | Endpoint | Описание                     |
|-------|----------|------------------------------|
| GET | `/api/sales` | Записать продажи             |
| GET | `/api/orders` | Записать заказы              |
| GET | `/api/stocks` | Записать остатки на складе   |
| GET | `/api/incomes` | Записать доходы (за сегодня) |

**Параметры запроса:**
- `from` — дата начала периода (Y-m-d)
- `to` — дата конца периода (Y-m-d)

```
Пример:
http://localhost/api/sales?from=2026-03-06&to=2026-03-08
http://localhost/api/orders?from=2026-03-06&to=2026-03-08
http://localhost/api/stocks?from=2026-03-06&to=2026-03-08
http://localhost/api/incomes(Сам подставит текущую дату по UTC)
```

## Console Commands

```bash
# Парсинг данных из API
php artisan parse:api-data [--from=YYYY-MM-DD] [--to=YYYY-MM-DD]

# Примеры:
php artisan parse:api-data --from=2026-03-01 --to=2026-03-31
```

