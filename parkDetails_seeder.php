<?php 

require_once 'parks_login.php';
require_once 'db_connect.php';
require_once 'Park.php';

$dbc->exec("TRUNCATE np_details");

$records = [

['Acadia','Maine','1919-02-26',47389.67, 'acad/index.htm', 'The First Eastern National Park', 
	'People have been drawn to the rugged coast of Maine throughout history. Awed by its beauty and diversity, early 20th-century visionaries donated the land that became Acadia National Park. The park is home to many plants and animals, and the tallest mountain on the U.S. Atlantic coast. Today visitors come to Acadia to hike granite peaks, bike historic carriage roads, or relax and enjoy the scenery.', 'National'],

['American Samoa', 'American Samoa','1988-10-31',9000.00, 'npsa/index.htm', 'The Islands of Sacred Earth', 
	'The National Park of American Samoa welcomes you into the heart of the South Pacific, to a world of sights, sounds, and experiences that you will find in no other national park in the United States.', 'National'],

['Arches','Utah','1929-04-12',76518.98, 'arch/index.htm', 'A red rock wonderland', 
	'Visit Arches and discover a landscape of contrasting colors, landforms and textures unlike any other in the world. The park has over 2,000 natural stone arches, in addition to hundreds of soaring pinnacles, massive fins and giant balanced rocks. This red rock wonderland will amaze you with its formations, refresh you with its trails, and inspire you with its sunsets.', 'National'],

['Badlands','South Dakota','1978-11-10',242755.94, 'badl/index.htm', 'Good Times in the Badlands',
	'The rugged beauty of the Badlands draws visitors from around the world. These striking geologic deposits contain one of the world’s richest fossil beds. Ancient mammals such as the rhino, horse, and saber-toothed cat once roamed here. The park’s 244,000 acres protect an expanse of mixed-grass prairie where bison, bighorn sheep, prairie dogs, and black-footed ferrets live today.', 'National'],

['Big Bend','Texas','1944-06-12',801163.21, 'bibe/index.htm', 'Splendid Isolation, the Big Bend...',
	'There is a place in Far West Texas where night skies are dark as coal and rivers carve temple-like canyons in ancient limestone. Here, at the end of the road, hundreds of bird species take refuge in a solitary mountain range surrounded by weather-beaten desert. Tenacious cactus bloom in sublime southwestern sun, and diversity of species is the best in the country. This magical place is Big Bend.', 'National'],

['Biscayne','Florida','1980-06-28',172924.07, 'bisc/index.htm', 'A Watery Wonderland',
	'Within sight of downtown Miami, yet worlds away, Biscayne protects a rare combination of aquamarine waters, emerald islands, and fish-bejeweled coral reefs. Here too is evidence of 10,000 years of human history, from pirates and shipwrecks to pineapple farmers and presidents. Outdoors enthusiasts can boat, snorkel, camp, watch wildlife…or simply relax in a rocking chair gazing out over the bay.', 'National'],

['Black Canyon of the Gunnison','Colorado','1999-10-21',32950.03, 'blca/index.htm', 'Deep, Steep and Narrow',
	'Big enough to be overwhelming, still intimate enough to feel the pulse of time, Black Canyon of the Gunnison exposes you to some of the steepest cliffs, oldest rock, and craggiest spires in North America. With two million years to work, the Gunnison River, along with the forces of weathering, has sculpted this vertical wilderness of rock, water, and sky.', 'National'],

['Bryce Canyon','Utah','1928-02-25',35835.08, 'brca/index.htm', 'A forest of stone' , 
	'There is no place like Bryce Canyon. Hoodoos [odd-shaped pillars of rock left standing from the forces of erosion] can be found on every continent, but here is the largest collection of hoodoos in the world! Descriptions fail. Photographs do not do it justice. Bring your sense of wonder and imagination when visiting Bryce Canyon National Park.', 'National'],

['Canyonlands','Utah','1964-09-12',337597.83, 'cany/index.htm' ,'A lifetime of exploration awaits you' , 
	'Canyonlands invites you to explore a wilderness of countless canyons and fantastically formed buttes carved by the Colorado River and its tributaries. Rivers divide the park into four districts: Island in the Sky, The Needles, The Maze, and the rivers themselves. These areas share a primitive desert atmosphere, but each offers different opportunities for sightseeing and adventure.', 'National'],

['Capitol Reef','Utah','1971-12-18',241904.26, 'care/index.htm' , 'Discover the Waterpocket Fold, a geologic wrinkle on earth!' , 
	'Located in south-central Utah in the heart of red rock country, Capitol Reef National Park is a hidden treasure filled with cliffs, canyons, domes and bridges in the Waterpocket Fold, a geologic monocline [a wrinkle on the earth] extending almost 100 miles.', 'National'], 

['Carlsbad Caverns','New Mexico','1930-05-14',46766.45, 'cave/index.htm', 'Beauty and Wonder; Above and Below', 
	'High ancient sea ledges, deep rocky canyons, flowering cactus and desert wildlife - treasures above the ground in the Chihuahuan Desert. Hidden beneath the surface are more than 119 caves - formed when sulfuric acid dissolved limestone leaving behind caverns of all sizes.', 'National'],

['Channel Islands','California','1980-03-05',249561.00, 'chis/index.htm', 'Close to the California Mainland...Yet Worlds Apart' , 
	'Channel Islands National Park encompasses five remarkable islands and their ocean environment, preserving and protecting a wealth of natural and cultural resources. Isolation over thousands of years has created unique animals, plants, and archeological resources found nowhere else on Earth and helped preserve a place where visitors can experience coastal southern California as it once was.', 'National'],

['Congaree','South Carolina','2003-11-10',26545.86, 'cong/index.htm', 'Home of Champions' , 
	'Astonishing biodiversity exists in Congaree National Park, the largest intact expanse of old growth bottomland hardwood forest remaining in the southeastern United States.  Waters from the Congaree and Wateree Rivers sweep through the floodplain, carrying nutrients and sediments that nourish and rejuvenate this ecosystem and support the growth of national and state champion trees.', 'National'],

['Crater Lake','Oregon','1902-05-22',183224.05, 'crla/index.htm', 'Deep Water in a Sleeping Volcano','Crater Lake inspires awe. Native Americans witnessed its formation 7,700 years ago, when a violent eruption triggered the collapse of a tall peak. Scientists marvel at its purity: fed by rain and snow, it’s the deepest lake in the USA and perhaps the most pristine on earth. Artists, photographers, and sightseers gaze in wonder at its blue water and stunning setting atop the Cascade Mountain Range.', 'National' ],

['Cuyahoga Valley','Ohio','2000-10-11',32860.73, 'cuva/index.htm' , 'Cuyahoga Valley National Park',
	'Though a short distance from the urban areas of Cleveland and Akron, Cuyahoga Valley National Park seems worlds away. The park is a refuge for native plants and wildlife, and provides routes of discovery for visitors. The winding Cuyahoga River gives way to deep forests, rolling hills, and open farmlands. Walk or ride the Towpath Trail to follow the historic route of the Ohio & Erie Canal.', 'National'],

['Death Valley','California, Nevada','1994-10-31',3372401.96, 'deva/index.htm', 'Hottest, Driest, and Lowest National Park',
	'In this below-sea-level basin, steady drought and record summer heat make Death Valley a land of extremes. Yet, each extreme has a striking contrast. Towering peaks are frosted with winter snow. Rare rainstorms bring vast fields of wildflowers. Lush oases harbor tiny fish and refuge for wildlife and humans. Despite its morbid name, a great diversity of life survives in Death Valley.', 'National'],

['Denali','Alaska','1917-02-26',4740911.72, 'dena/index.htm', 'More than a mountain', 
	'Denali is six million acres of wild land, bisected by one ribbon of road. Travelers along it see the relatively low-elevation taiga forest give way to high alpine tundra and snowy mountains, culminating in North America\'s tallest peak, 20,310\' Denali. Wild animals large and small roam un-fenced lands, living as they have for ages. Solitude, tranquility and wilderness await.' , 'National'],

['Dry Tortugas','Florida','1992-10-26',64701.22, 'drto/index.htm', 'Explore a 19th Century Fort and snorkel crystal clear water with incredible marine life', 
	'Almost 70 miles [113 km] west of Key West lies the remote Dry Tortugas National Park. The 100-square mile park is mostly open water with seven small islands.  Accessible only by boat or seaplane, the park is known the world over as the home of magnificent Fort Jefferson, picturesque blue waters, superlative coral reefs and marine life,  and the vast assortment of bird life that frequent the area.', 'National'], 

['Everglades','Florida','1934-05-30',1508537.90, 'ever/index.htm', 'The largest subtropical wilderness in the United States' , 
	'Everglades National Park protects an unparalleled landscape that provides important habitat for numerous rare and endangered species like the manatee,  American crocodile, and the elusive Florida panther. An international treasure as well -  a World Heritage Site, International Biosphere Reserve, a Wetland of International Importance, and a specially protected area under the Cartagena Treaty.', 'National'],

['Gates of the Arctic','Alaska','1980-12-02',7523897.74, 'gaar/index.htm', 'Discover a Premier Wilderness' ,
	'This vast landscape does not contain any roads or trails. Visitors discover intact ecosystems where people have lived with the land for thousands of years. Wild rivers meander through glacier-carved valleys, caribou migrate along age-old trails, endless summer light fades into aurora-lit night skies of winter. It remains virtually unchanged except by the forces of nature.', 'National'],

['Glacier','Montana','1910-05-11',1013572.41, 'glac/index.htm', 'Crown of the Continent' , 
	'As the Crown of the Continent, Glacier is the headwaters for streams that flow to the Pacific Ocean, the Gulf of Mexico, and to Hudson\'s Bay. What happens here affects waters in a huge section of North America. Due to a detection of invasive mussel populations in central Montana, Glacier has closed all park waters to motorized and trailered watercraft until further notice.', 'National'],

['Glacier Bay','Alaska','1980-12-02',3224840.31, 'glba/index.htm', 'Southeast Alaskan Wilderness' ,
	'Covering 3.3 million acres of rugged mountains, dynamic glaciers, temperate rainforest, wild coastlines and deep sheltered fjords, Glacier Bay National Park is a highlight of Alaska\'s Inside Passage and part of a 25-million acre World Heritage Site—one of the world’s largest international protected areas. From sea to summit, Glacier Bay offers limitless opportunities for adventure and inspiration.', 'National'],

['Grand Canyon','Arizona','1919-02-26',1217403.32, 'grca/index.htm', 'Grand Canyon National Park' , 
	'Unique combinations of geologic color and erosional forms decorate a canyon that is 277 river miles [446km] long, up to 18 miles [29km] wide, and a mile [1.6km] deep. Grand Canyon overwhelms our senses through its immense size', 'National'],

['Grand Teton','Wyoming','1929-02-26',309994.66, 'grte/index.htm', 'Mountains of the Imagination', 
	'Rising above a scene rich with extraordinary wildlife, pristine lakes, and alpine terrain, the Teton Range stands monument to the people who fought to protect it. These are mountains of the imagination. Mountains that led to the creation of Grand Teton National Park where you can explore over two hundred miles of trails, float the Snake River or enjoy the serenity of this remarkable place.', 'National'],

['Great Basin','Nevada','1986-10-27',77180.00, 'grba/index.htm', 'A Land of Surprising Diversity', 
	'From the 13,000-foot summit of Wheeler Peak, to the sage-covered foothills, Great Basin National Park is a place to sample the stunning diversity of the larger Great Basin region. Come and partake of the solitude of the wilderness, walk among ancient bristlecone pines, bask in the darkest of night skies, and explore mysterious subterranean passages. There\'s a whole lot more than just desert here!', 'National'],

['Great Sand Dunes','Colorado','2004-09-13',42983.74, 'grsa/index.htm', 'Dunes Among Diversity' , 
	'The tallest dunes in North America are the centerpiece in a diverse landscape of grasslands, wetlands, conifer and aspen forests, alpine lakes, and tundra. Experience this diversity through hiking, sand sledding, splashing in Medano Creek, wildlife watching, and more! The park and preserve are open 24 hours a day, so plan to also experience night skies and nocturnal wildlife during your visit.', 'National'],

['Great Smoky Mountains','North Carolina, Tennessee','1934-06-15',521490.13, 'grsm/index.htm', 'A Wondrous Diversity of Life',
	'Ridge upon ridge of forest straddles the border between North Carolina and Tennessee in Great Smoky Mountains National Park. World renowned for its diversity of plant and animal life, the beauty of its ancient mountains, and the quality of its remnants of Southern Appalachian mountain culture, this is America\'s most visited national park.', 'National'],

['Guadalupe Mountains','Texas','1966-10-15',86415.97, 'grba/index.htm', 'A Land of Surprising Diversity', 
	'From the 13,000-foot summit of Wheeler Peak, to the sage-covered foothills, Great Basin National Park is a place to sample the stunning diversity of the larger Great Basin region. Come and partake of the solitude of the wilderness, walk among ancient bristlecone pines, bask in the darkest of night skies, and explore mysterious subterranean passages. There\'s a whole lot more than just desert here!', 'National'],

['Haleakalā','Hawaii','1916-08-01',29093.67, 'hale/index.htm', 'A Rare And Sacred Landscape', 
	'This special place vibrates with stories of ancient and modern Hawaiian culture and protects the bond between the land and its people. The park also cares for endangered species, some of which exist nowhere else. Come visit this special place - renew your spirit amid stark volcanic landscapes and sub-tropical rain forest with an unforgettable hike through the backcountry.', 'National'],

['Hawaii Volcanoes','Hawaii','1916-08-01',323431.38, 'havo/index.htm', 'Experience the Heartbeat of a Volcanic Landscape', 
	'Volcanoes are monuments to Earth\'s origin, evidence that its primordial forces are still at work. During a volcanic eruption, we are reminded that our planet is an ever-changing environment whose basic processes are beyond human control. As much as we have altered the face of the Earth to suit our needs, we can only stand in awe before the power of an eruption.', 'National'],

['Hot Springs','Arkansas','1921-03-04', 5549.75, 'hosp/index.htm', 'Hot springs in the middle of town?', 
	'Water. That\'s what first attracted people, and they have been coming here ever since to use these soothing thermal waters to heal and relax. Rich and poor alike came for the baths, and a thriving city built up around the hot springs. Together nicknamed \"The American Spa,\" Hot Springs National Park today surrounds the north end of the city of Hot Springs, Arkansas. Come discover it for yourself.', 'National'],

['Isle Royale','Michigan','1940-04-03',571790.11, 'isro/index.htm', 'Your Invitation to a Superior Wilderness Experience', 
	'Explore a rugged, isolated island, far from the sights and sounds of civilization. Surrounded by Lake Superior, Isle Royale offers unparalleled solitude and adventures for backpackers, hikers, boaters, kayakers, canoeists and scuba divers. Here, amid stunning scenic beauty, you\'ll find opportunities for reflection and discovery, and make memories that last a lifetime.', 'National'],

['Joshua Tree','California','1994-10-31',789745.47, 'jotr/index.htm', 'Where Two Deserts Meet' ,
	'Two distinct desert ecosystems, the Mojave and the Colorado, come together in Joshua Tree National Park. A fascinating variety of plants and animals make their homes in a land sculpted by strong winds and occasional torrents of rain. Dark night skies, a rich cultural history, and surreal geologic features add to the wonder of this vast wilderness in southern California. Come explore for yourself.', 'National'],

['Katmai','Alaska','1980-12-02',3674529.68, 'katm/index.htm', 'Welcome to Katmai Country', 
	'Katmai National Monument was established in 1918 to protect the volcanically devastated region surrounding Mount Katmai and the Valley of Ten Thousand Smokes. Today, Katmai National Park and Preserve remains an active volcanic landscape, but it also protects 9,000 years of human history as well as important habitat for salmon and thousands of brown bears.', 'National'],

['Kenai Fjords','Alaska','1980-12-02',669982.99, 'kefj/index.htm', 'Where Mountains, Ice, and Ocean Meet', 
	'At the edge of the Kenai Peninsula lies a land where the ice age lingers. Nearly 40 glaciers flow from the Harding Icefield, Kenai Fjords\' crowning feature. Wildlife thrives in icy waters and lush forests around this vast expanse of ice. Native Alutiiq relied on these resources to nurture a life entwined with the sea. Today, shrinking glaciers bear witness to the effects of our changing climate.', 'National'],

['Kings Canyon','California','1940-03-04',461901.20, 'seki/index.htm', 'A Land of Giants', 
	'This dramatic landscape testifies to nature\'s size, beauty, and diversity huge mountains, rugged foothills, deep canyons, vast caverns, and the world\'s largest trees. These two parks lie side by side in the southern Sierra Nevada east of the San Joaquin Valley. Weather varies a lot by season and elevation, which ranges from 1,370\' to 14,494\'.', 'National'],

['Kobuk Valley','Alaska','1980-12-02',1750716.50, 'kova/index.htm', 'Wilderness Adventure', 
	'Caribou, sand dunes, the Kobuk River, Onion Portage - just some of the facets of Kobuk Valley National Park. Half a million caribou migrate through, their tracks crisscrossing sculpted dunes. The Kobuk River is an ancient and current path for people and wildlife. For 9000 years, people came to Onion Portage to harvest caribou as they swam the river. Even today, that rich tradition continues.', 'National'],

['Lake Clark','Alaska','1980-12-02',2619733.21, 'lacl/index.htm', 'Stunning Wilderness', 
	'Lake Clark National Park is a land of stunning beauty where volcanoes steam, salmon run, bears forage, craggy mountains reflect in shimmering turquoise lakes, and local people and culture still depend on the land and water of their home.  Solitude is found around every bend in the river and shoulder of a mountain.  Venture into the park to become part of the wilderness.', 'National'],

['Lassen Volcanic','California','1916-08-09',106372.36, 'lavo/index.htm', 'Explore the Undiscovered', 
	'Lassen Volcanic National Park is home to steaming fumaroles, meadows freckled with wildflowers, clear mountain lakes, and numerous volcanoes. Jagged peaks tell the story of its eruptive past while hot water continues to shape the land. Lassen Volcanic offers opportunities to discover the wonder and mysteries of volcanoes and hot water for visitors willing to explore the undiscovered.', 'National'],

['Mammoth Cave','Kentucky','1941-07-01',52830.19, 'maca/index.htm', 'A Grand, Gloomy and Peculiar Place', 
	'Mammoth Cave National Park preserves the cave system and a part of the Green River valley and hilly country of south central Kentucky. This is the world\'s longest known cave system, with more than 400 miles explored. Early guide Stephen Bishop called the cave a \"grand, gloomy and peculiar place,\" but its vast chambers and complex labyrinths have earned its name - Mammoth.', 'National'],

['Mesa Verde','Colorado','1906-06-29',52121.93, 'meve/index.htm', 'Preserving the Works of Man', 
	'Mesa Verde, Spanish for green table, offers a spectacular look into the lives of the Ancestral Pueblo people who made it their home for over 700 years, from AD 600 to 1300. Today the park protects nearly 5,000 known archeological sites, including 600 cliff dwellings. These sites are some of the most notable and best preserved in the United States.', 'National'],

['Mount Rainier','Washington','1899-03-02',235625.00, 'mora/index.htm', 'An Icon on the Horizon', 
	'Ascending to 14,410 feet above sea level, Mount Rainier stands as an icon in the Washington landscape. An active volcano, Mount Rainier is the most glaciated peak in the contiguous U.S.A., spawning six major rivers. Subalpine wildflower meadows ring the icy volcano while ancient forest cloaks Mount Rainier’s lower slopes. Wildlife abounds in the park’s ecosystems. A lifetime of discovery awaits.', 'National'],

['North Cascades','Washington','1968-10-02',504780.94, 'noca/index.htm', 'The North Cascades are Calling!', 
	'Less than three hours from Seattle, an alpine landscape beckons. Discover communities of life adapted to moisture in the west and recurring fire in the east. Explore jagged peaks crowned by more than 300 glaciers. Listen to cascading waters in forested valleys. Witness a landscape sensitive to the Earth\'s changing climate. Help steward the ecological heart of the Cascades.', 'National'],

['Olympic','Washington','1938-06-29',922650.86, 'olym/index.htm', 'Discover Olympic\'s Diverse Wilderness', 
	'With its incredible range of precipitation and elevation, diversity is the hallmark of Olympic National Park. Encompassing nearly a million acres, the park protects a vast wilderness, thousands of years of human history, and several distinctly different ecosystems, including glacier-capped mountains, old-growth temperate rain forests, and over 70 miles of wild coastline. Come explore!', 'National'],

['Petrified Forest','Arizona','1962-12-09',93532.57, 'pefo/index.htm', 'A Place for Discovery', 
	'Did you know that Petrified Forest is more spectacular than ever? While the park has all the wonders known for a century, there are many new adventures and discoveries to share. There are backcountry hikes into areas never open before such as Red Basin and little known areas like the Martha\'s Butte. There are new exhibits that bring the stories to life. Come rediscover Petrified Forest!', 'National'],

['Pinnacles','California','2013-01-10',26605.73, 'pinn/index.htm', 'Born of Fire', 
	'Some 23 million years ago multiple volcanoes erupted, flowed, and slid to form what would become Pinnacles National Park. What remains is a unique landscape. Travelers journey through chaparral, oak woodlands, and canyon bottoms. Hikers enter rare talus caves and emerge to towering rock spires teeming with life: prairie and peregrine falcons, golden eagles, and the inspiring California condor.', 'National'],

['Redwood','California','1968-10-02',112512.05, 'redw/index.htm', 'Tall Trees and So Much More',
	'Most people know Redwood as home to the tallest trees on Earth. The parks also protect vast prairies, oak woodlands, wild riverways, and nearly 40 miles of rugged coastline.  For thousands of years people have lived in this verdant landscape.  Together, the National Park Service and California State Parks manage these lands for the inspiration, enjoyment, and education of all.', 'National'],

['Rocky Mountain','Colorado','1915-01-26',265828.41, 'romo/index.htm', 'Feel Like You’re On Top of the World!', 
	'Rocky Mountain National Park’s 415 square miles encompass and protect spectacular mountain environments. Enjoy Trail Ridge Road – which crests at over 12,000 feet including many overlooks to experience the subalpine and alpine worlds – along with over 300 miles of hiking trails, wildflowers, wildlife, starry nights, and fun times. In a world of superlatives, Rocky is on top!', 'National'],

['Saguaro','Arizona','1994-10-14',91439.71, 'sagu/index.htm', 'Welcome to Saguaro National Park', 
	'Tucson, Arizona is home to the nation\'s largest cacti. The giant saguaro is the universal symbol of the American west. These majestic plants, found only in a small portion of the United States, are protected by Saguaro National Park, to the east and west of the modern city of Tucson. Here you have a chance to see these enormous cacti, silhouetted by the beauty of a magnificent desert sunset.', 'National'],

['Sequoia','California','1890-09-25',404051.17, 'seki/index.htm', 'A Land of Giants', 
	'This dramatic landscape testifies to nature\'s size, beauty, and diversity-huge mountains, rugged foothills, deep canyons, vast caverns, and the world\'s largest trees. These two parks lie side by side in the southern Sierra Nevada east of the San Joaquin Valley. Weather varies a lot by season and elevation, which ranges from 1,370\' to 14,494\'.', 'National'],

['Shenandoah','Virginia','1926-05-22',199045.23, 'shen/index.htm', 'Nature\’s Calling!', 
	'Just 75 miles from the bustle of Washington, D.C., Shenandoah National Park is your escape to recreation and re-creation. Cascading waterfalls, spectacular vistas, quiet wooded hollows—take a hike, meander along Skyline Drive, or picnic with the family. 200,000 acres of protected lands are haven to deer, songbirds, the night sky…and you. Plan a Shenandoah escape today!', 'National'],

['Theodore Roosevelt','North Dakota','1978-11-10',70446.89, 'thro/index.htm', 'In Honor of a President' ,
'When Theodore Roosevelt came to Dakota Territory to hunt bison in 1883, he was a skinny, young, spectacled dude from New York. He could not have imagined how his adventure in this remote and unfamiliar place would forever alter the course of the nation. The rugged landscape and strenuous life that TR experienced here would help shape a conservation policy that we still benefit from today.', 'National'],

['Virgin Islands','United States Virgin Islands','1956-08-02',14688.87, 'viis/index.htm', 'American Paradise', 
	'Virgin Islands National Park’s hills, valleys and beaches are breathtaking. However, within its 7,000 plus acres on the island of St. John is the complex history of civilizations - both free and enslaved - dating back more than a thousand years, all who utilized the land and the sea for survival. Use the links below to learn about the history, culture and resources of Virgin Islands National Park.', 'National'],

['Voyageurs','Minnesota','1971-01-08',218200.17, 'voya/index.htm', 'The Heart of the Continent', 
	'Voyageurs National Park lies within the heart of the North American Continent.  Here you can see and touch rocks half as old as the world, experience the life of a voyageur, immerse yourself in the sights and sounds of a boreal forest, view the dark skies, or ply the interconnected water routes. Leave your car behind and set out on the water highways of the North Woods.', 'National'],

['Wind Cave','South Dakota','1903-01-09',28295.03, 'wica/index.htm', 'A hidden world beneath the prairie', 
	'Bison, elk, and other wildlife roam the rolling prairie grasslands and forested hillsides of one of America\'s oldest national parks. Below the remnant island of intact prairie sits Wind Cave, one of the longest and most complex caves in the world. Named for barometric winds at its entrance, this maze of passages is home to boxwork, a unique formation rarely found elsewhere.', 'National'],

['Wrangell–​St. Elias','Alaska','1980-12-02',8323147.59, 'wrst/index.htm', 'America\'s Largest National Park' , 
	'Wrangell St. Elias is a vast national park that rises from the ocean all the way up to 18,008 ft. Mount St. Elias. At 13.2 million acres, it’s the same size as Yellowstone Nat. Park, Yosemite Nat. Park, and Switzerland combined! Within this wild landscape, people continue to live off the land as they have done for centuries. This is a rugged, beautiful area filled with opportunities for adventure.', 'National'],

['Yellowstone','Wyoming, Montana, Idaho','1872-03-01',2219790.71, 'yell/index.htm', 'Marvel. Explore. Discover.' , 
	'Visit Yellowstone and experience the world\'s first national park. Marvel at a volcano’s hidden power rising up in colorful hot springs, mudpots, and geysers. Explore mountains, forests, and lakes to watch wildlife and witness the drama of the natural world unfold. Discover the history that led to the conservation of our national treasures for the benefit and enjoyment of the people.', 'National'],

['Yosemite','California','1890-10-01',761266.19, 'yose/index.htm', 'Yosemite', 
	'Not just a great valley, but a shrine to human foresight, the strength of granite, the power of glaciers, the persistence of life, and the tranquility of the High Sierra.First protected in 1864, Yosemite National Park is best known for its waterfalls, but within its nearly 1,200 square miles, you can find deep valleys, grand meadows, ancient giant sequoias, a vast wilderness area, and much more.', 'National'],

['Zion','Utah','1919-11-19', 146597.60, 'zion/index.htm', 'Utah\'s First National Park', 
	'Follow the paths where ancient native people and pioneers walked. Gaze up at massive sandstone cliffs of cream, pink, and red that soar into a brilliant blue sky. Experience wilderness in a narrow slot canyon. Zion’s unique array of plants and animals will enchant you as you absorb the rich history of the past and enjoy the excitement of present day adventures.', 'National']

];



foreach($records as $record){


	$park = new Park();
	$park->name = $record[0];
	$park->location = $record[1];
	$park->dateEstablished = $record[2];
	$park->areaInAcres = $record[3];
	$park->url= $record[4];
	$park->tagline = $record[5];
	$park->description = $record[6];
	$park->type = $record[7];

	$park->insert();
}






