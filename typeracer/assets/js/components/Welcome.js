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
        this.state = { exercise: [], currentIndex: 0, errorIndex: -1, backIndex: 0, users: [], lobby: [], room: "", roomUrl: "/welcome?rt=", loading: true};
        
        const search = window.location.search;
        const query = new URLSearchParams(search);
        this.state.room = query.get('rt');
        console.log(this.state.room);
    }
    
    componentDidMount() {
        this.getSession();
    }

    getSession(){
        axios.post(`/api/profile`).then(profile =>{
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
            axios.post(`/api/lobby`, params).then(lobby =>{
                console.log("Joined lobby: "+ lobby.data);
                this.state.roomUrl = this.state.roomUrl + lobby.data.lobby;
                this.setState({ lobby: lobby.data, loading: false});
                this.setState({ exercise: this.state.lobby.exercise.split('') });
            })
        }
    }
    
    getUsers() {
        const prms = new URLSearchParams();
        if(this.state.room != undefined) {
            prms.append('rt', this.state.room);
        }
        
        axios.post(`/api/roomstatus`, prms).then(userData =>{
            //this.state.users = userData.data;
            this.setState({ users: userData.data, loading: false});
            console.log(this.state.users);
        })

    }

    getLetterClass(index) {
        let result = `char`;
        if(this.state.currentIndex == index) {
            result = `char`;
        }
        return result;
    }

    keyfunction(e) {
        switch(e.key) {
			case 'Shift':	// only for silly opera
                return;
            case 'CapsLock':	// only for silly opera
                return;
			case 'Enter':
				return;
            case 'Meta':
                return;
		}
        console.log(e.key);
        console.log(e.charCode);
        console.log(e.keyCode);
        console.log(e.target.value);
        const str = e.target.value.split('');
        console.log("Could hit letter is :" + this.state.exercise[this.state.currentIndex]);

        console.log("hitted letter is :" + e.target.value.substr(str.length-1,str.length));
        console.log(this.state.exercise);
        console.log("errorIndex: " + this.state.errorIndex);
        console.log("currentIndex: " + this.state.currentIndex);
        console.log(str);
        console.log(str.length);
        if(str.length > this.state.currentIndex) {
            if(this.state.exercise[this.state.currentIndex] == e.target.value.substr(str.length-1,str.length)) {
                if(this.state.errorIndex == this.state.currentIndex) {
                    console.log('aldaagaa zasaj bn');
                    this.setState({ errorIndex: -1 });
                } else {
                    console.log('zuv darlaa');
                    if(this.state.exercise[this.state.currentIndex] == ' ' && this.state.errorIndex == '-1' ) {
                        e.target.value = "";
                        this.setState({ backIndex: this.state.currentIndex });
                    }
                }
            } else {
                this.setState({ errorIndex: this.state.currentIndex });
                console.log('aldaa xiilee');
            }
            this.setState({ currentIndex: (this.state.currentIndex + 1) });
            this.state.currentIndex  =this.state.currentIndex + 1;
        } else {
            if(this.state.currentIndex == 0) {
                return;
            }
            this.setState({ currentIndex: (this.state.currentIndex - 1) });
        }
        console.log(this.state.exercise);
        console.log("errorIndex: " + this.state.errorIndex);
        console.log("currentIndex: " + this.state.currentIndex);
        console.log("backIndex: " + this.state.backIndex);
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

                        {this.state.exercise.map((value, index) => {
                            return <span className={this.getLetterClass(index)} key={index}>{value}</span>
                        })}
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