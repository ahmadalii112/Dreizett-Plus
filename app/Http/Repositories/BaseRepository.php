<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository
{
    protected Model $model;

    /**
     * The function returns all records from the model with the specified relationships.
     *
     * @param  array  $with with The "with" parameter is an array that specifies the relationships that should
     * be eager loaded with the query. Eager loading allows you to load related models in a more
     * efficient way, reducing the number of database queries.
     * @return Collection a collection of all the records from the model, with any specified
     * relationships loaded using the "with" method.
     */
    public function all(array $with = []): Collection
    {
        return $this->model->with($with)->get();
    }

    /**
     * The function returns paginated records from the model with the specified relationships.
     *
     * @param  array  $with with The "with" parameter is an array that specifies the relationships that should
     * be eager loaded with the query. Eager loading allows you to load related models in a more
     * efficient way, reducing the number of database queries.
     * @return LengthAwarePaginator a collection of all the records from the model, with any specified
     * relationships loaded using the "with" method.
     */
    public function paginate(array $with = [], int $perPage = 10, array $where = [], array $orWhere = []): LengthAwarePaginator
    {
        return $this->model->with($with)->where($where)->orWhere($orWhere)->paginate($perPage);
    }

    /**
     * The function updates records in a database table based on specified conditions.
     *
     * @param  array  $where where An associative array specifying the conditions that the rows must meet in
     * order to be updated. The keys of the array represent the column names, and the values represent
     * the desired values for those columns.
     * @param  array  $data data The "data" parameter is an array that contains the data that you want to
     * update in the database. Each key-value pair in the array represents a column name and its
     * corresponding value that you want to update.
     * @param  array  $orWhere orWhere The "orWhere" parameter is an optional array that specifies additional
     * conditions for the update query. These conditions are combined using the OR operator. If this
     * parameter is not provided, the update query will only use the conditions specified in the
     * "where" parameter.
     * @return bool A boolean value is being returned.
     */
    public function update(array $where, array $data, array $orWhere = []): bool
    {
        $record = $this->model->where($where)->orWhere($orWhere)->first();

        return $record->update($data);
    }

    /**
     * The function finds a model by its ID and optionally loads related models.
     *
     * @param  int  $id id The "id" parameter is an integer that represents the unique identifier of the
     * model you want to find. It is used to query the database and retrieve the model with the
     * specified id.
     * @param  array  $with with The "with" parameter is an optional array that specifies the relationships to
     * be eager loaded with the model. Eager loading allows you to load related models in a single
     * query, which can help improve performance when accessing related data.
     * @return ?Model an instance of the Model class or null.
     */
    public function find(int $id, array $with = []): ?Model
    {
        return $this->model->with($with)->find($id);
    }

    /**
     * The function checks if a record exists in the database based on the given conditions.
     *
     * @param  array  $where where An array of conditions to be used in the WHERE clause of the SQL query. Each
     * element of the array represents a condition, where the key is the column name and the value is
     * the value to be compared against.
     * @param  array  $orWhere orWhere The "orWhere" parameter is an optional array that specifies additional
     * conditions for the query. These conditions will be combined using the OR operator. If no
     * conditions are provided, the query will only use the conditions specified in the "where"
     * parameter.
     * @return bool a boolean value.
     */
    public function exists(array $where, array $orWhere = []): bool
    {
        return $this->model->where($where)->orWhere($orWhere)->exists();
    }

    /**
     * The function updates or creates a record in the database based on the given conditions and data.
     *
     * @param  array  $where where An associative array that specifies the conditions for the update or creation
     * of the model. The keys of the array represent the column names, and the values represent the
     * corresponding values to match against.
     * @param  array  $data data The data parameter is an array that contains the data you want to update or
     * create in the database. It typically includes key-value pairs where the keys represent the
     * column names in the database table and the values represent the new values you want to set for
     * those columns.
     * @return Model an instance of the Model class.
     */
    public function updateOrCreate(array $where, array $data): Model
    {
        return $this->model->updateOrCreate($where, $data);
    }

    /**
     * The function retrieves data from the model based on the given conditions and relationships.
     *
     * @param  array  $where where An array of conditions to be used in the WHERE clause of the query. Each
     * element of the array should be in the format of column name as the key and the value to compare
     * against as the value.
     * @param  array  $orWhere orWhere The "orWhere" parameter is an array that specifies the conditions for the
     * "OR" part of the query. It allows you to specify multiple conditions that will be combined using
     * the "OR" operator. Each condition in the array should be in the format `[column, operator,
     * value]`, where `
     * @param  array  $with The "with" parameter is an array that specifies the relationships that should be
     * eager loaded with the query results. It allows you to load related models in a single query to
     * improve performance.
     * @return Collection a Collection.
     */
    public function get(array $where = [], array $orWhere = [], array $with = []): Collection
    {
        return $this->model->with($with)->where($where)->orWhere($orWhere)->get();
    }

    /**
     * The function returns the first model that matches the given conditions and includes any
     * specified relationships.
     *
     * @param  array  $where where An array of conditions to be used in the WHERE clause of the query. Each
     * element of the array should be in the format of column => value.
     * @param  array  $orWhere orWhere The "orWhere" parameter is an array that specifies the conditions for the
     * "orWhere" clause in the database query. It allows you to specify multiple conditions that are
     * connected with the "OR" operator. Each element in the array represents a condition, and the
     * conditions are combined using the "OR" operator
     * @param  array  $whereNotNull whereNotNull The "whereNotNull" parameter is an array that specifies the conditions
     * for selecting records where the specified columns are not null. It is used in the "whereNotNull"
     * method of the query builder to add the conditions to the query.
     * @param  array  $with with The "with" parameter is used to specify the relationships that should be eager
     * loaded with the model. It accepts an array of relationship names.
     * @return ?Model a single instance of a Model object, or null if no matching record is found.
     */
    public function first(array $where = [], array $orWhere = [], array $whereNotNull = [], array $with = []): ?Model
    {
        return $this->model->with($with)->where($where)->orWhere($orWhere)->whereNotNull($whereNotNull)->first();
    }

    /**
     * The create function takes an array of data and creates a new model instance using that data.
     *
     * @param  array  $data data The "data" parameter is an array that contains the data to be used for
     * creating a new model instance. This array typically includes key-value pairs where the keys
     * represent the attributes of the model and the values represent the values to be assigned to
     * those attributes.
     * @return Model The create method is returning an instance of the Model class.
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Delete a model instance by its ID.
     *
     * @param  int  $id The ID of the model instance to delete.
     * @return bool Returns true if the model instance was successfully deleted; otherwise, returns false.
     */
    public function delete(int $id): bool
    {
        $model = $this->model->find($id);

        if ($model) {
            return $model->delete();
        }

        return false;
    }

    public function pluck(string $valueColumn = 'name', string $keyColumn = 'key'): array
    {
        return $this->model->pluck($valueColumn, $keyColumn)->toArray();
    }

    public function role($roleName)
    {
        return $this->model->role($roleName);
    }
}
