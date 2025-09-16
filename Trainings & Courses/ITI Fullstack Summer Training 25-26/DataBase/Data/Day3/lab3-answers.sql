-- TASK 1

SELECT * FROM orders 
WHERE(user_id , order_date) 
IN (SELECT user_id , MAX(order_date) 
FROM orders GROUP BY(user_id));


-- TASK2

SELECT users.name,order_date,total FROM orders
JOIN users ON users.id = user_id
WHERE total = (SELECT MAX(total) FROM orders);

-- TASK3

SELECT users.name,order_date,total FROM orders
JOIN users ON users.id = user_id
WHERE total = (SELECT MAX(total) FROM orders);

-- TASK4

SELECT *
FROM users
WHERE id NOT IN (
  SELECT DISTINCT user_id
  FROM orders
  WHERE order_date >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH)
);

-- TASK5

SELECT 
    YEAR(order_date) AS order_year,
    MONTH(order_date) AS order_month,
    COUNT(*) AS total_orders
FROM 
    orders
GROUP BY 
    YEAR(order_date), MONTH(order_date)
ORDER BY 
    total_orders DESC
LIMIT 1;

-- TASK6

SELECT 
    YEAR(order_date) AS order_year,
    MONTH(order_date) AS order_month,
    SUM(total) AS total_price
FROM 
    orders
GROUP BY 
    YEAR(order_date), MONTH(order_date)
ORDER BY 
    total_price DESC
LIMIT 1;

-- TASK7

SELECT users.name, orders.total, orders.order_date
FROM orders 
JOIN users  ON orders.user_id = users.id
WHERE 
  MONTH(orders.order_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
  AND YEAR(orders.order_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
ORDER BY orders.total DESC
LIMIT 1;

-- TASK8

SELECT 
  p.name AS product_name,
  c.name AS category_name,
  p.price,
  CASE
    WHEN p.price > 1000 THEN 'Expensive'
    WHEN p.price < 500 THEN 'Cheap'
    ELSE 'Moderate'
  END AS price_category
FROM products p
JOIN categories c ON p.category_id = c.id;