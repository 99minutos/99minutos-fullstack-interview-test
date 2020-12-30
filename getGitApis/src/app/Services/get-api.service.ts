import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {GLOBAL} from './global.service';


@Injectable({
  providedIn: 'root'
})
export class GetApiService {
  public urlBranch:string;

  constructor(private _http: HttpClient) { 
    this.urlBranch = GLOBAL.urlBranch;
  }

  getBranchList(){

  let headers = new HttpHeaders({ 'Accept': 'application/vnd.github.v3+json' });
  return this._http.get(this.urlBranch,  { headers: headers })
  }

  getCommitsFromBranch(urlBranchCommit){
    let headers = new HttpHeaders({ 'Accept': 'application/vnd.github.v3+json' });
    return this._http.get(urlBranchCommit,  { headers: headers })
  }

}
