# z-framework
New Version of lil-mvc

# Run Documentation
1. Serving Site Command - php run | php run serve --port=8000
2. Run Migration Table Command - php run migration table
3. Run Migration Seeder Command - php run migration seeder | php run migration seeder --fresh
4. Run Database Export Command - php run database export
5. Run Databse Import Command - php run database import
6. Run Tools 
	- php run tools create:migration migration_name --create=table_name|--table=table_name
	- php run tools create:seeder table_name
	- php run tools create:model ModelClass --table=table_name
	- php run tools create:controller ControllerClass
	- php run tools create:middleware MiddewareClass