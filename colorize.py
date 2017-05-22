import sys
import Algorithmia # instalar como root mediante PIP!
import urllib

def colorize(_IMAGE_URL_):

    _API_KEY_ = "simIoQ5pGPEutaiTBD3JgXp0kaC1"
    URL_BASE = "https://algorithmia.com/v1/data/"

    input = {"image": _IMAGE_URL_}
    client = Algorithmia.client(_API_KEY_)
    algo = client.algo('deeplearning/ColorfulImageColorization/1.1.6')

    s = algo.pipe(input).__repr__()
    
    link = ""

    for i in s[41:]:
        if i != "'":
            link += i
        else:
            break

    return URL_BASE + link

def main():
    print colorize(sys.argv[1])

if __name__ == "__main__":
    main()
