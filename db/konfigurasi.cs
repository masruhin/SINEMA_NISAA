using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Kosasihlearn
{
    #region Konfigurasi
    public class Konfigurasi
    {
        #region Member Variables
        protected int _id;
        protected unknown _telpon;
        protected string _email;
        protected string _instagram;
        protected string _alamat;
        protected string _judul;
        protected string _deskripsi;
        protected string _banner;
        protected string _logo;
        #endregion
        #region Constructors
        public Konfigurasi() { }
        public Konfigurasi(unknown telpon, string email, string instagram, string alamat, string judul, string deskripsi, string banner, string logo)
        {
            this._telpon=telpon;
            this._email=email;
            this._instagram=instagram;
            this._alamat=alamat;
            this._judul=judul;
            this._deskripsi=deskripsi;
            this._banner=banner;
            this._logo=logo;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual unknown Telpon
        {
            get {return _telpon;}
            set {_telpon=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Instagram
        {
            get {return _instagram;}
            set {_instagram=value;}
        }
        public virtual string Alamat
        {
            get {return _alamat;}
            set {_alamat=value;}
        }
        public virtual string Judul
        {
            get {return _judul;}
            set {_judul=value;}
        }
        public virtual string Deskripsi
        {
            get {return _deskripsi;}
            set {_deskripsi=value;}
        }
        public virtual string Banner
        {
            get {return _banner;}
            set {_banner=value;}
        }
        public virtual string Logo
        {
            get {return _logo;}
            set {_logo=value;}
        }
        #endregion
    }
    #endregion
}