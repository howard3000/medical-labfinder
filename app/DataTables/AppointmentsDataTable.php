<?php

namespace App\DataTables;

use App\Models\Appointment;
use App\Models\Lab;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Auth;

class AppointmentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    //public function dataTable(QueryBuilder $query): EloquentDataTable
    //{
        // return (new EloquentDataTable($query))
        //     ->addColumn('action', 'appointments.action')
        //     ->setRowId('id');
   // }

 public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'appointments.action');
    }






    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AppointmentsDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Appointment $model): QueryBuilder
    {
        $current_user = Auth::user()->id;
            $labs = Lab::get();

        foreach( $labs as $lab){
            if( $lab->user_id == $current_user ){
                  $currentLab = $lab->name;
             }
        }

        $start_date = $this->request()->get(key:'start_date');
        $end_date = $this->request()->get(key:'end_date');
        $location = $this->request()->get(key:'location');

        $query = $model->newQuery()->where('lab', '=', $currentLab );

        if(!empty($start_date) && !empty($end_date) && !empty($location)){
            $start_date = Carbon::parse($start_date);
            $end_date = Carbon::parse($end_date);

            $range = [$start_date, $end_date];

            $query = $query->where('location', $location)->whereBetween('created_at', $range);
        }

        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId(id:'appointments-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    //->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        //Button::make('pdf'),
                        Button::make('print'),
                        //Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            'fullname', 'phone', 'location', 'date', 'time', 'created_at'
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(true)
            //       ->width(60)
            //       ->addClass('text-center'),
            // Column::make('id'),
            // Column::make('fullname'),
            // Column::make('phone'),
            // Column::make('location'),
            // Column::make('date'),
            // Column::make('time'),
            // Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Appointments_' . date('YmdHis');
    }
}
