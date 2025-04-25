<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseManagerController extends Controller
{
    public function index()
    {
        // Get all tables in the database
        $tables = DB::select('SHOW TABLES');
        $tableNames = array_map(function($table) {
            $table = (array) $table;
            return reset($table); // Get the first value
        }, $tables);

        return view('admin.database.index', compact('tableNames'));
    }

    public function showTable(Request $request, $tableName)
    {
        // Validate that this is a real table in our database
        if (!Schema::hasTable($tableName)) {
            return redirect()->route('admin.database.index')
                ->with('error', 'Table does not exist');
        }

        // Get the column information
        $columns = Schema::getColumnListing($tableName);
        
        // Get the data with pagination
        $records = DB::table($tableName)->paginate(15);
        
        // Get primary key
        $primaryKey = $this->getPrimaryKey($tableName);
        
        return view('admin.database.table', compact('tableName', 'columns', 'records', 'primaryKey'));
    }
    
    public function editRecord(Request $request, $tableName, $id)
    {
        // Validate that this is a real table in our database
        if (!Schema::hasTable($tableName)) {
            return redirect()->route('admin.database.index')
                ->with('error', 'Table does not exist');
        }
        
        // Get primary key
        $primaryKey = $this->getPrimaryKey($tableName);
        
        if (!$primaryKey) {
            return redirect()->route('admin.database.table', $tableName)
                ->with('error', 'Cannot edit: No primary key found');
        }
        
        // Get the record
        $record = DB::table($tableName)->where($primaryKey, $id)->first();
        
        if (!$record) {
            return redirect()->route('admin.database.table', $tableName)
                ->with('error', 'Record not found');
        }
        
        // Get the column information
        $columns = Schema::getColumnListing($tableName);
        
        // Get column types
        $columnTypes = [];
        foreach ($columns as $column) {
            $type = DB::select("SHOW COLUMNS FROM {$tableName} WHERE Field = '{$column}'")[0]->Type;
            $columnTypes[$column] = $type;
        }
        
        return view('admin.database.edit', compact('tableName', 'columns', 'record', 'primaryKey', 'id', 'columnTypes'));
    }
    
    public function updateRecord(Request $request, $tableName, $id)
    {
        // Validate that this is a real table in our database
        if (!Schema::hasTable($tableName)) {
            return redirect()->route('admin.database.index')
                ->with('error', 'Table does not exist');
        }
        
        // Get primary key
        $primaryKey = $this->getPrimaryKey($tableName);
        
        if (!$primaryKey) {
            return redirect()->route('admin.database.table', $tableName)
                ->with('error', 'Cannot update: No primary key found');
        }
        
        // Remove the CSRF token from the request data
        $data = $request->except(['_token', '_method']);
        
        // Update the record
        try {
            DB::table($tableName)->where($primaryKey, $id)->update($data);
            return redirect()->route('admin.database.table', $tableName)
                ->with('success', 'Record updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.database.edit', [$tableName, $id])
                ->with('error', 'Error updating record: ' . $e->getMessage())
                ->withInput();
        }
    }
    
    public function deleteRecord(Request $request, $tableName, $id)
    {
        // Validate that this is a real table in our database
        if (!Schema::hasTable($tableName)) {
            return redirect()->route('admin.database.index')
                ->with('error', 'Table does not exist');
        }
        
        // Get primary key
        $primaryKey = $this->getPrimaryKey($tableName);
        
        if (!$primaryKey) {
            return redirect()->route('admin.database.table', $tableName)
                ->with('error', 'Cannot delete: No primary key found');
        }
        
        // Delete the record
        try {
            DB::table($tableName)->where($primaryKey, $id)->delete();
            return redirect()->route('admin.database.table', $tableName)
                ->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.database.table', $tableName)
                ->with('error', 'Error deleting record: ' . $e->getMessage());
        }
    }
    
    public function createRecord(Request $request, $tableName)
    {
        // Validate that this is a real table in our database
        if (!Schema::hasTable($tableName)) {
            return redirect()->route('admin.database.index')
                ->with('error', 'Table does not exist');
        }
        
        // Get the column information
        $columns = Schema::getColumnListing($tableName);
        
        // Get column types
        $columnTypes = [];
        foreach ($columns as $column) {
            $type = DB::select("SHOW COLUMNS FROM {$tableName} WHERE Field = '{$column}'")[0]->Type;
            $columnTypes[$column] = $type;
        }
        
        return view('admin.database.create', compact('tableName', 'columns', 'columnTypes'));
    }
    
    public function storeRecord(Request $request, $tableName)
    {
        // Validate that this is a real table in our database
        if (!Schema::hasTable($tableName)) {
            return redirect()->route('admin.database.index')
                ->with('error', 'Table does not exist');
        }
        
        // Remove the CSRF token from the request data
        $data = $request->except(['_token', '_method']);
        
        // Create the record
        try {
            DB::table($tableName)->insert($data);
            return redirect()->route('admin.database.table', $tableName)
                ->with('success', 'Record created successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.database.create', $tableName)
                ->with('error', 'Error creating record: ' . $e->getMessage())
                ->withInput();
        }
    }
    
    /**
     * Helper function to get primary key of table
     */
    private function getPrimaryKey($tableName)
    {
        $query = "SHOW KEYS FROM {$tableName} WHERE Key_name = 'PRIMARY'";
        $primaryKeyInfo = DB::select($query);
        
        if (empty($primaryKeyInfo)) {
            return null;
        }
        
        return $primaryKeyInfo[0]->Column_name;
    }
}
