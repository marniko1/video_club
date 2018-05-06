delimiter //
create procedure NUM_OF_FILMS_AT_CLIENT (_client varchar(45))
	begin
	declare client_id int;

	select id from clients where concat(first_name, " ", last_name) = _client into client_id;

	select count(*) as num_of_films_at_client from rentals_films where id_rental in (select id from rentals where id_client = client_id and opened = 'yes');

	end//
delimiter ;

----------------------------------------------------------------------------------------------------------------------------------
delimiter //
create procedure UNOS_PORUDZBINE (_client varchar(45), _title_1 varchar(45), _title_2 varchar(45), _title_3 varchar(45), _title_4 varchar(45), _title_5 varchar(45))
	begin
	declare id_client int;
	declare id_rental int;
	declare curr_client_stock int;


	select id from clients where first_name = _first_name and last_name = _last_name into id_client;
	select stock from clients where first_name = _first_name and last_name = _last_name into curr_client_stock;
	
	set @client_stock = curr_client_stock;
	set @totals = 0;


	insert into rentals values (null, id_client, 0, now(), now() + interval 2 day, 1);

	set @max_rentals_id = (select max(id) from rentals);
	
	

	if _title_1 is not null then
		set @id_film = (select id from films where title = _title_1);
		set @film_price = (select price from films where title = _title_1);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_1);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_1;
	end if;
	if _title_2 is not null then
		set @id_film = (select id from films where title = _title_2);
		set @film_price = (select price from films where title = _title_2);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_2);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_2;
	end if;
	if _title_3 is not null then
		set @id_film = (select id from films where title = _title_3);
		set @film_price = (select price from films where title = _title_3);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_3);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_3;
	end if;
	if _title_4 is not null then
		set @id_film = (select id from films where title = _title_4);
		set @film_price = (select price from films where title = _title_4);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_4);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_4;
	end if;
	if _title_5 is not null then
		set @id_film = (select id from films where title = _title_5);
		set @film_price = (select price from films where title = _title_5);
		insert into rentals_films values (null, @max_rentals_id, @id_film);
		set @totals = @totals + @film_price;
		set @client_stock = @client_stock + 1;
		set @current_film_stock = (select current_stock from films where title = _title_5);
		set @current_film_stock = @current_film_stock - 1;
		update films set current_stock = @current_film_stock where title = _title_5;
	end if;
	
	update rentals set totals = @totals where id = @max_rentals_id;
	update clients set stock = @client_stock where first_name = _first_name and last_name = _last_name;

	end//
delimiter ;

call UNOS_PORUDZBINE (null, null, null, 'Sekula se opet zeni', 'Umri muski 2', 'Marko', 'Nikolic');