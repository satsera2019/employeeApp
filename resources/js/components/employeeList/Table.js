import axios from 'axios';
import React, { Component } from 'react';
import TableRow from './TableRow';
import { ToastContainer,  toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import CreateModal from './Modals/CreateModal';

class Table extends Component {


    constructor(props) {
        super(props);

        this.state = {
            employees: [],
        }
    }

    // life cycle method.
    componentDidMount() {
        this.getEmployeeList();
    }

    // get employee list
    getEmployeeList = () => {
        var self = this;
        axios.get('/get/employee/list').then(function (response) {
            self.setState({
                employees: response.data
            });
        });
    }

    render() {
        return (
            <div className="container">
                <ToastContainer/>
                <CreateModal/>
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <table className='table table-hover'>
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {
                                        this.state.employees.map(function (val, key) {
                                            return <TableRow key={key} data={val}/>
                                        })
                                    }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Table;