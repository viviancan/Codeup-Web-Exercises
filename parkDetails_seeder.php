<?php 

require_once 'parks_login.php';
require_once 'db_connect.php';

$dbc->exec("TRUNCATE np_details");


$statement = "INSERT INTO np_details(name, location, date_established, area, home_url)

VALUES
('Acadia','Maine','1919-02-26',47389.67, 'acad/index.htm'),

('American Samoa', 'American Samoa','1988-10-31',9000.00, 'npsa/index.htm'),

('Arches','Utah','1929-04-12',76518.98, 'arch/index.htm'),

('Badlands','South Dakota','1978-11-10',242755.94, 'badl/index.htm'),

('Big Bend','Texas','1944-06-12',801163.21, 'bibe/index.htm'),

('Biscayne','Florida','1980-06-28',172924.07, 'bisc/index.htm'),

('Black Canyon of the Gunnison','Colorado','1999-10-21',32950.03, 'blca/index.htm'),

('Bryce Canyon','Utah','1928-02-25',35835.08, 'brca/index.htm'),

('Canyonlands','Utah','1964-09-12',337597.83, 'cany/index.htm'),

('Capitol Reef','Utah','1971-12-18',241904.26, 'care/index.htm'),

('Carlsbad Caverns','New Mexico','1930-05-14',46766.45, 'cave/index.htm'),

('Channel Islands','California','1980-03-05',249561.00, 'chis/index.htm'),

('Congaree','South Carolina','2003-11-10',26545.86, 'cong/index.htm'),

('Crater Lake','Oregon','1902-05-22',183224.05, 'crla/index.htm'),

('Cuyahoga Valley','Ohio','2000-10-11',32860.73, 'cuva/index.htm'),

('Death Valley','California, Nevada','1994-10-31',3372401.96, 'deva/index.htm'),

('Denali','Alaska','1917-02-26',4740911.72, 'dena/index.htm'),

('Dry Tortugas','Florida','1992-10-26',64701.22, 'drto/index.htm'),

('Everglades','Florida','1934-05-30',1508537.90, 'ever/index.htm'),

('Gates of the Arctic','Alaska','1980-12-02',7523897.74, 'gaar/index.htm'),

('Glacier','Montana','1910-05-11',1013572.41, 'glac/index.htm'),

('Glacier Bay','Alaska','1980-12-02',3224840.31, 'glba/index.htm'),

('Grand Canyon','Arizona','1919-02-26',1217403.32, 'grca/index.htm'),

('Grand Teton','Wyoming','1929-02-26',309994.66, 'grte/index.htm'),

('Great Basin','Nevada','1986-10-27',77180.00, 'grba/index.htm'),

('Great Sand Dunes','Colorado','2004-09-13',42983.74, 'grsa/index.htm'),

('Great Smoky Mountains','North Carolina, Tennessee','1934-06-15',521490.13, 'grsm/index.htm'),

('Guadalupe Mountains','Texas','1966-10-15',86415.97, 'grba/index.htm'),

('Haleakalā','Hawaii','1916-08-01',29093.67, 'hale/index.htm'),

('Hawaii Volcanoes','Hawaii','1916-08-01',323431.38, 'havo/index.htm'),

('Hot Springs','Arkansas','1921-03-04', 5549.75, 'hosp/index.htm'),

('Isle Royale','Michigan','1940-04-03',571790.11, 'isro/index.htm'),

('Joshua Tree','California','1994-10-31',789745.47, 'jotr/index.htm'),

('Katmai','Alaska','1980-12-02',3674529.68, 'katm/index.htm'),

('Kenai Fjords','Alaska','1980-12-02',669982.99, 'kefj/index.htm'),

('Kings Canyon','California','1940-03-04',461901.20, 'seki/index.htm'),

('Kobuk Valley','Alaska','1980-12-02',1750716.50, 'kova/index.htm'),

('Lake Clark','Alaska','1980-12-02',2619733.21, 'lacl/index.htm'),

('Lassen Volcanic','California','1916-08-09',106372.36, 'lavo/index.htm'),

('Mammoth Cave','Kentucky','1941-07-01',52830.19, 'maca/index.htm'),

('Mesa Verde','Colorado','1906-06-29',52121.93, 'meve/index.htm' ),

('Mount Rainier','Washington','1899-03-02',235625.00, 'mora/index.htm'),

('North Cascades','Washington','1968-10-02',504780.94, 'noca/index.htm'),

('Olympic','Washington','1938-06-29',922650.86, 'olym/index.htm'),

('Petrified Forest','Arizona','1962-12-09',93532.57, 'pefo/index.htm'),

('Pinnacles','California','2013-01-10',26605.73, 'pinn/index.htm'),

('Redwood','California','1968-10-02',112512.05, 'redw/index.htm'),

('Rocky Mountain','Colorado','1915-01-26',265828.41, 'romo/index.htm'),

('Saguaro','Arizona','1994-10-14',91439.71, 'sagu/index.htm'),

('Sequoia','California','1890-09-25',404051.17, 'seki/index.htm'),

('Shenandoah','Virginia','1926-05-22',199045.23, 'shen/index.htm'),

('Theodore Roosevelt','North Dakota','1978-11-10',70446.89, 'thro/index.htm'),

('Virgin Islands','United States Virgin Islands','1956-08-02',14688.87, 'viis/index.htm'),

('Voyageurs','Minnesota','1971-01-08',218200.17, 'voya/index.htm'),

('Wind Cave','South Dakota','1903-01-09',28295.03, 'wica/index.htm'),

('Wrangell–​St. Elias','Alaska','1980-12-02',8323147.59, 'wrst/index.htm'),

('Yellowstone','Wyoming, Montana, Idaho','1872-03-01',2219790.71, 'yell/index.htm'),

('Yosemite','California','1890-10-01',761266.19, 'yose/index.htm'),

('Zion','Utah','1919-11-19', 146597.60, 'zion/index.htm');" ;

// exec method returns the number of rows affected
$rowsInserted = $dbc->exec($statement);
if($rowsInserted) {
    echo "$rowsInserted number of rows inserted..." . PHP_EOL;
} else {
    echo "nothing was entered into the db";
}




