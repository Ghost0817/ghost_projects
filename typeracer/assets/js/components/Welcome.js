import React, {Component} from 'react';
import axios from 'axios';

/*
restdb
sainzaya.b@gmail.com
j3fF5s6R3p@NKQY

*/
    
class Welcome extends Component {
    constructor() {
        super();
        this.state = { currentIndex: 0, users: [], lobby: [], room: "", roomUrl: "https://192.168.1.3:8000/welcome?rt=", loading: true};
        
        const search = window.location.search;
        const query = new URLSearchParams(search);
        this.state.room = query.get('rt');
        console.log(this.state.room);
    }
    
    componentDidMount() {
        this.getSession();
    }

    getSession(){
        axios.post(`https://192.168.1.3:8000/api/profile`).then(profile =>{
            if(!window.sessionStorage.hasOwnProperty('session_id')) {
                console.log("inserted session: "+ profile.data['session_id']);
                window.sessionStorage.setItem('session_id', profile.data['session_id']);
            }
            this.getLobby();
            this.getUsers();
            //setInterval(() => { this.getUsers(); }, 2000);
            
        })
    }

    getLobby(){
        if(!window.sessionStorage.getItem('session_id') != null) {
            const params = new URLSearchParams();
            params.append('session_id', window.sessionStorage.getItem('session_id'));
            if(this.state.room != undefined) {
                params.append('rt', this.state.room);
            }
            axios.post(`https://192.168.1.3:8000/api/lobby`, params).then(lobby =>{
                console.log("Joined lobby: "+ lobby.data);
                this.state.roomUrl = this.state.roomUrl + lobby.data.lobby;
                this.setState({ lobby: lobby.data, loading: false})
            })
        }
    }
    
    getUsers() {
        const prms = new URLSearchParams();
        if(this.state.room != undefined) {
            prms.append('rt', this.state.room);
        }
        
        axios.post(`https://192.168.1.3:8000/api/roomstatus`, prms).then(userData =>{
            //this.state.users = userData.data;
            this.setState({ users: userData.data, loading: false});
            console.log(this.state.users);
        })

    }

    exersiceText() {
        let text = <span>{this.state.lobby.exersice}</span>;
        console.log(this.state.lobby.exersice);
        console.log(this.state.lobby.exersice.lenght);
        console.log(this.state.lobby.currentIndex);
        console.log(this.state.lobby.exersice[this.state.currentIndex]);
        console.log('>>>>>>>>>>>>>>>>>>>>>');

        return text;
    }

    keyfunction(e) {
        console.log(e.key);
        console.log(e.charCode);
        console.log(e.keyCode);
        console.log(e.target.value);
        let str =""+e.target.value;
        console.log(this.state.lobby.exersice[this.state.currentIndex]);

        console.log(e.target.value.substr(str.lenght-1,str.lenght));
        console.log('>>>>>>>>>>>>>>>>>>>>>');
    }
    
    render() {
        const loading = this.state.loading;
        return(
            <div>
                <section className="row-section">
                    <div className="container">
                        <h1>Invite people to this racetrack</h1>
                        <p>Give this URL to the people you want to invite (valid for 24 hours):</p>
                        <input type="text" value={this.state.roomUrl} />

                        {this.exersiceText()}
                        {this.state.lobby.exersice}
<input type="text" onKeyUp={(e) => this.keyfunction(e)} />
                        {loading ? (
                            <div className={'row text-center'}>
                                <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>
                        ) : (
                            <div className={'row'}>
                                {this.state.users.map((value, index) => {
                                    let result = "";
                                    result = value.user == window.sessionStorage.getItem('session_id') ? "Guest (you)" + value.speed + "wpm": "Guest" + value.speed + "wpm";
                                    return <li key={index}>{result}</li>
                                })}
                            </div>
                        )}
                    </div>
                </section>
            </div>
        )
    }
}


export default Welcome;