DROP TABLE IF EXISTS Diet;

CREATE TABLE Diet (
    Diets VARCHAR(15),
    Description VARCHAR(50)
);

INSERT INTO Diet (Diets, Description) VALUES
    ('VEG', 'Vegetarian'),
    ('VG', 'Vegan'),
    ('PES', 'Pescatarian'),
    ('FLEX', 'Flexitarian'),
    ('PALEO', 'Paleo'),
    ('KETO', 'Keto/Ketogenic'),
    ('MED', 'Mediterranean'),
    ('HAL', 'Halal'),
    ('KOSH', 'Kosher'),
    ('GF', 'Gluten-free'),
    ('LC', 'Low-Carb'),
    ('CARN', 'Carnivore'),
    ('RAW', 'Raw Food'),
    ('LACTO-VEG', 'Lacto-Vegetarian'),
    ('OVO-VEG', 'Ovo-Vegetarian'),
    ('LACTO-OVO-VEG', 'Lacto-Ovo-Vegetarian');
