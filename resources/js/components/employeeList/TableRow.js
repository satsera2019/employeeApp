import axios from 'axios';
import React, { Component } from 'react';

class TableRow extends Component {
    
    constructor(prop){
        super(prop);
    }
    
    render(){
        return(
            <tr>
                <th scope="row">{this.props.data.id}</th>
                <td>{this.props.data.employee_name}</td>
                <td>{this.props.data.salary}</td>
                <td>@mdo</td>
            </tr>
        )
    }
}
export default TableRow;